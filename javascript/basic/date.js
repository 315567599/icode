// to test a function and get back its return
function printElapsedTime (fTest) {
    var nStartTime = Date.now(),
        vReturn = fTest(),
        nEndTime = Date.now();
    alert("Elapsed time: " + String(nEndTime - nStartTime) + " milliseconds"); 
    return vReturn;
}
yourFunctionReturn = printElapsedTime(yourFunction);
