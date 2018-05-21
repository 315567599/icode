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
