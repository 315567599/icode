Deliver CSS and JavaScript fast (bundled, minified, and avoiding duplication) while retaining the benefits of caching. The ResourceLoader does this.
Defer loading modules that don't affect the initial rendering of the page, particularly "above the fold" (the top portion of the page that's initially visible on the user's screen). So load as little JavaScript as possible with position 'top'; instead load more components asynchronously or with the default ResourceLoader behavior of loading at the bottom of the page. See loading modules for more information.
Users should have a smooth experience; different components should render progressively. Preserve positioning of elements (e.g. avoid pushing down content in a reflow). need code from a bad example
------------------

ur code is running in a shared environment. Thus, long-running SQL queries can't run as part of the web request. Instead they should be made to run on a dedicated server (use the JobQueue), and watch out for deadlocks and lock-wait timeouts.

The tables you create will be shared by other code. Every database query must be able to use one of the indexes (including write queries!). EXPLAIN your queries and create new indices where required.

Wikimedia uses and depends heavily on many different caching layers, so your code needs to work in that environment! (But it also must work if everything misses cache.)


The cache hit ratio should be as high as possible; watch out if you're introducing new cookies, shared resources, bundled requests or calls, or other changes that will vary requests and reduce cache hit ratio.

