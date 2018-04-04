#define MAX_HASH_TABLE_ELEM 4096
static struct htable *gClassRefHTable = NULL;
/*初始化has htable*/
if (!gClassRefHTable) {
	gClassRefHTable = htable_alloc(MAX_HASH_TABLE_ELEM, ht_hash_string,
			ht_compare_string);
	if (!gClassRefHTable) {
		jthr = newRuntimeError(env, "htable_alloc failed\n");
	}
}

//存储key-val 到hash table
ret = htable_put(gClassRefHTable, (void*)className, clazz);

//从hash table 取key-val
clazz = htable_get(gClassRefHTable, className);
