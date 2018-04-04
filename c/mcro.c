#define increment_used_memory(_n) do { \
    if (zmalloc_thread_safe) { \
        pthread_mutex_lock(&used_memory_mutex);  \
        used_memory += _n; \
        pthread_mutex_unlock(&used_memory_mutex); \
    } else { \
        used_memory += _n; \
    } \
} while(0)

#define decrement_used_memory(_n) do { \
    if (zmalloc_thread_safe) { \
        pthread_mutex_lock(&used_memory_mutex);  \
        used_memory -= _n; \
        pthread_mutex_unlock(&used_memory_mutex); \
    } else { \
        used_memory -= _n; \
    } \
} while(0)

static size_t used_memory = 0;
static int zmalloc_thread_safe = 0;
pthread_mutex_t used_memory_mutex = PTHREAD_MUTEX_INITIALIZER;

////////////////////////////////////////////////////////////////////////////////

#define PREFIX_SIZE (sizeof(size_t))
 /* Explicitly override malloc/free etc when using tcmalloc. */
 #if defined(USE_TCMALLOC)
 #define malloc(size) tc_malloc(size)
 #define calloc(count,size) tc_calloc(count,size)
 #define realloc(ptr,size) tc_realloc(ptr,size)
 #define free(ptr) tc_free(ptr)
 #endif

void *zmalloc(size_t size) {
    void *ptr = malloc(size+PREFIX_SIZE);

    if (!ptr) zmalloc_oom(size);
#ifdef HAVE_MALLOC_SIZE
    increment_used_memory(redis_malloc_size(ptr));
    return ptr;
#else
    *((size_t*)ptr) = size;
    increment_used_memory(size+PREFIX_SIZE);
    return (char*)ptr+PREFIX_SIZE;
#endif
}
////////////////////////////////////////////////////////////////////////////////

