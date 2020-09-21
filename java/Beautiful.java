{
    String property = properties.getProperty(Constants.DRUID_TIME_BETWEEN_LOG_STATS_MILLIS);
    if (property != null && property.length() > 0) {
        try {
            long value = Long.parseLong(property);
            this.setTimeBetweenLogStatsMillis(value);
        } catch (NumberFormatException e) {
            LOG.error("illegal property '" + Constants.DRUID_TIME_BETWEEN_LOG_STATS_MILLIS + "'", e);
        }
    }
}

import java.util.concurrent.locks.Lock;    
public void restart() throws SQLException {
    lock.lock();
    try {
        if (activeCount > 0) {
            throw new SQLException("can not restart, activeCount not zero. " + activeCount);
        }
        if (LOG.isInfoEnabled()) {
            LOG.info("{dataSource-" + this.getID() + "} restart");
        }

        this.close();
        this.resetStat();
        this.inited = false;
        this.enable = true;
        this.closed = false;
    } finally {
        lock.unlock();
    }
}


private final AtomicLong                 resetCount              = new AtomicLong();
resetCount.incrementAndGet();



private void createAndLogThread() {
    if (this.timeBetweenLogStatsMillis <= 0) {
        return;
    }

    String threadName = "Druid-ConnectionPool-Log-" + System.identityHashCode(this);
    logStatsThread = new LogStatsThread(threadName);
    logStatsThread.start();

    this.resetStatEnable = false;
}

public class LogStatsThread extends Thread {
    public LogStatsThread(String name){
        super(name);
        this.setDaemon(true);
    }

    public void run() {
        try {
            for (;;) {
                try {
                    logStats();
                } catch (Exception e) {
                    LOG.error("logStats error", e);
                }

                Thread.sleep(timeBetweenLogStatsMillis);
            }
        } catch (InterruptedException e) {
            // skip
        }
    }
}


/**
 * 会去重复
 * 
 * @param filter
 */
private void addFilter(Filter filter) {
    boolean exists = false;
    for (Filter initedFilter : this.filters) {
        if (initedFilter.getClass() == filter.getClass()) {
            exists = true;
            break;
        }
    }

    if (!exists) {
        filter.init(this);
        this.filters.add(filter);
    }

}


 public Properties loadConfig(String filePath) {
        Properties properties = new Properties();

        InputStream inStream = null;
        try {
            boolean xml = false;
            if (filePath.startsWith("file://")) {
                filePath = filePath.substring("file://".length());
                inStream = getFileAsStream(filePath);
                xml = filePath.endsWith(".xml");
            } else if (filePath.startsWith("http://") || filePath.startsWith("https://")) {
                URL url = new URL(filePath);
                inStream = url.openStream();
                xml = url.getPath().endsWith(".xml");
            } else if (filePath.startsWith("classpath:")) {
                String resourcePath = filePath.substring("classpath:".length());
                inStream = Thread.currentThread().getContextClassLoader().getResourceAsStream(resourcePath);
                // 在classpath下应该也可以配置xml文件吧？
                xml = resourcePath.endsWith(".xml");
            } else {
                inStream = getFileAsStream(filePath);
                xml = filePath.endsWith(".xml");
            }

            if (inStream == null) {
                LOG.error("load config file error, file : " + filePath);
                return null;
            }

            if (xml) {
                properties.loadFromXML(inStream);
            } else {
                properties.load(inStream);
            }

            return properties;
        } catch (Exception ex) {
            LOG.error("load config file error, file : " + filePath, ex);
            return null;
        } finally {
            JdbcUtils.close(inStream);
        }
    }




StackTraceElement[] stackTrace = Thread.currentThread().getStackTrace();
poolableConnection.connectStackTrace = stackTrace;

StringBuilder buf = new StringBuilder();
    buf.append("wait millis ")//
        .append(waitNanos / (1000 * 1000))//
        .append(", active ").append(activeCount)//
        .append(", maxActive ").append(maxActive)//
        .append(", creating ").append(creatingCount.get())//
        ;



public boolean isPermittedRequest(HttpServletRequest request) {
    String remoteAddress = getRemoteAddress(request);
    return isPermittedRequest(remoteAddress);
}

protected String getRemoteAddress(HttpServletRequest request) {
    String remoteAddress = null;

    if (remoteAddressHeader != null) {
        remoteAddress = request.getHeader(remoteAddressHeader);
    }

    if (remoteAddress == null) {
        remoteAddress = request.getRemoteAddr();
    }

    return remoteAddress;
}

IPRange ipRange = new IPRange(item);
allowList.add(ipRange);

protected List<IPRange>    allowList           = new ArrayList<IPRange>();
protected List<IPRange>    denyList            = new ArrayList<IPRange>();
public boolean isPermittedRequest(String remoteAddress) {
    boolean ipV6 = remoteAddress != null && remoteAddress.indexOf(':') != -1;

    if (ipV6) {
        return "0:0:0:0:0:0:0:1".equals(remoteAddress) || (denyList.size() == 0 && allowList.size() == 0);
    }

    IPAddress ipAddress = new IPAddress(remoteAddress);

    for (IPRange range : denyList) {
        if (range.isIPAddressInRange(ipAddress)) {
            return false;
        }
    }

    if (allowList.size() > 0) {
        for (IPRange range : allowList) {
            if (range.isIPAddressInRange(ipAddress)) {
                return true;
            }
        }

        return false;
    }

    return true;
}



InputStream resourceInputStream = null;

        try {
            // Append data specified in ranges to existing content for this
            // resource - create a temp. file on the local filesystem to
            // perform this operation
            // Assume just one range is specified for now
            if (range != null) {
                File contentFile = executePartialPut(req, range, path);
                resourceInputStream = new FileInputStream(contentFile);
            } else {
                resourceInputStream = req.getInputStream();
            }

            if (resources.write(path, resourceInputStream, true)) {
                if (resource.exists()) {
                    resp.setStatus(HttpServletResponse.SC_NO_CONTENT);
                } else {
                    resp.setStatus(HttpServletResponse.SC_CREATED);
                }
            } else {
                resp.sendError(HttpServletResponse.SC_CONFLICT);
            }
        } finally {
            if (resourceInputStream != null) {
                try {
                    resourceInputStream.close();
                } catch (IOException ioe) {
                    // Ignore
                }
            }
        }




protected String determineMethodsAllowed(HttpServletRequest req) {
        StringBuilder allow = new StringBuilder();

        // Start with methods that are always allowed
        allow.append("OPTIONS, GET, HEAD, POST");

        // PUT and DELETE depend on readonly
        if (!readOnly) {
            allow.append(", PUT, DELETE");
        }

        // Trace - assume disabled unless we can prove otherwise
        if (req instanceof RequestFacade &&
                ((RequestFacade) req).getAllowTrace()) {
            allow.append(", TRACE");
        }

        return allow.toString();
    }




 private CompressionFormat[] parseCompressionFormats(String precompressed, String gzip) {
        List<CompressionFormat> ret = new ArrayList<>();
        if (precompressed != null && precompressed.indexOf('=') > 0) {
            for (String pair : precompressed.split(",")) {
                String[] setting = pair.split("=");
                String encoding = setting[0];
                String extension = setting[1];
                ret.add(new CompressionFormat(extension, encoding));
            }
        } else if (precompressed != null) {
            if (Boolean.parseBoolean(precompressed)) {
                ret.add(new CompressionFormat(".br", "br"));
                ret.add(new CompressionFormat(".gz", "gzip"));
            }
        } else if (Boolean.parseBoolean(gzip)) {
            // gzip handling is for backwards compatibility with Tomcat 8.x
            ret.add(new CompressionFormat(".gz", "gzip"));
        }
        return ret.toArray(new CompressionFormat[ret.size()]);
    }



private static boolean isText(String contentType) {
        return  contentType == null || contentType.startsWith("text") ||
                contentType.endsWith("xml") || contentType.contains("/javascript");
    }


 private boolean pathEndsWithCompressedExtension(String path) {
        for (CompressionFormat format : compressionFormats) {
            if (path.endsWith(format.extension)) {
                return true;
            }
        }
        return false;
    }


第三个方法比较特殊，我们为每个线程都缓存一个instance，存放在ThreadLocal里，使用的时候从ThreadLocal里取就可以了:
private static ThreadLocal<SimpleDateFormat> formatCache = new ThreadLocal<SimpleDateFormat>() {

@Override
protected SimpleDateFormat initialValue() {
return new SimpleDateFormat(“yyyy-MM-dd”);
}

};

public static String formatDate3(Date date) {
SimpleDateFormat format = formatCache.get();
return format.format(date);
}



http://www.cnblogs.com/skywang12345/p/3479024.html

