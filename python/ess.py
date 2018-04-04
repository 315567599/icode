#!/usr/bin/python
#version:    v0.0.4

import requests
import os
import sys
import json
import urllib
import socket
from requests.packages.urllib3.util.retry import Retry
from requests.adapters import HTTPAdapter
from Queue import Queue

class public_bucket(object):

    read_only_domain  = "xxxx"
    read_write_domain = ""

    def __init__(self,Bucket):
        self.Bucket = Bucket
        self.uploadDomain   = "http://" + Bucket + "." + self.read_write_domain + "/"
        self.downloadDomain = "http://" + Bucket + "." + self.read_only_domain  + "/"

    #Upload file use http put method.
    def uploadFile_put(self,Key,File):
        upload_url   = self.uploadDomain + str(Key)
        download_url = self.downloadDomain + str(Key)
        inputdic = {}
        inputdic['filekey']  = Key
        inputdic['hostname'] = socket.gethostname()
        if os.path.getsize(File) < 5368709120:
            retries = Retry(total=3,backoff_factor=0.1,status_forcelist=[ 499,500, 502, 503, 504 ])
            s = requests.Session()
            s.mount('http://', HTTPAdapter(max_retries=retries))
            if not os.path.getsize(File):
                return json.dumps({"code":0,"msg":"upload failed.","description":"File is empty."})
            with open(File,'rb') as f:
                r = s.put(upload_url,data=f)
                if r.status_code == 200 and bool(self.writetoMongo(inputdic)):
                    jsondata = { 'code':1,'message':'upload successful','filename':File,'key':Key,'url':upload_url }
                    r.close()
                    return json.dumps(jsondata)
                else:
                    jsondata = { 'code':0,'message':'upload failed,check it.','filename':File,'key':Key,'url':upload_url }
                    return json.dumps(jsondata)
        else:
            if self.UploadParts(File,Key) == 200 and bool(self.writetoMongo(inputdic)):
                jsondata = { 'code':1,'message':'upload successful','filename':File,'key':Key,'url':upload_url }
                return json.dumps(jsondata)
            else:
                jsondata = { 'code':0,'message':'upload failed,check it.','filename':File,'key':Key,'url':upload_url }
                return json.dumps(jsondata)


    #Upload successful and write meta data to MySQL use http api.
    def writetoMongo(self,k):
        #dicd = urllib.urlencode({"filekey":k})
        dicd = urllib.urlencode(k)
        resp = requests.get('http://10.106.70.18:88/savekey',params=dicd)        
        if resp.status_code == 200:
            res = json.loads(resp.text.encode('utf8'))
            if res['code'] == "1":
                resp.close()
                return True
            else:
                resp.close()
                return False

    #Split the large file,maybe useful.
    def splitfile(self,file,size=1073741824,outdir="/tmp/logparts/"):
        FILE_SIZE    = os.path.getsize(file)
        SPLIT_SIZE   = size 
        OUT_DIR      = outdir
        OUT_PREFIX   = "parts_" 
        if FILE_SIZE % SPLIT_SIZE:
            PART_NUMBER = FILE_SIZE / SPLIT_SIZE + 1
        else:
            PART_NUMBER = FILE_SIZE / SPLIT_SIZE
        if bool(os.path.exists(OUT_DIR)) == False:os.mkdir(OUT_DIR)
        q1 = Queue()
        q2 = Queue()
        x = [ x for x in range(1,PART_NUMBER+1)]
        for v in x:q1.put(v)
        with open(file,'rb') as f:
            while True:
                zl = f.read(SPLIT_SIZE)
                if bool(zl) == False:break
                dest_file = OUT_DIR + OUT_PREFIX + str(q1.get())
                q2.put(dest_file)
                with open(dest_file,'w') as c:
                    c.write(zl)
        return q2
    
    #Make  a fragment request.
    def MakePartRequest(self,key):
        url   = self.uploadDomain + str(key)
        ps    = {"uploads":""} 
        resp  = requests.post(url,params=ps)
        resp.close()
        return str(json.loads(resp.content).get('uploadId'))
    
    #Upload multiple parts and commit merge.
    def UploadParts(self,f,k):
        vvv = []
        try:
            uploadId  = self.MakePartRequest(k)
        except:
            return json.dumps({"code":0,"msg":"upload failed.","description":"Get uploadID error,check it."})
            sys.exit()
        filekey   = k 
        try:
            partsinfo = self.splitfile(f) 
        except:
            return json.dumps({"code":0,"msg":"upload failed.","description":"Split file error,check it."})
            sys.exit()
        while True:
            if partsinfo.empty():break
            r     = {}
            task  = partsinfo.get()
            pn    = task.split('_')[1]
            r['PartNumber'] = pn
            ps    = {"uploadId":uploadId,"partNumber":pn}
            url   = self.uploadDomain + filekey
            with open(task,'rb') as f:
                resp = requests.put(url,params=ps,data=f)
            r['ETag'] = resp.headers.get('etag')
            vvv.append(r)
            resp.close()     
        aaa = requests.post(url,params={"uploadId":uploadId},json={"parts":vvv})
        aaa.close()
        return aaa.status_code
