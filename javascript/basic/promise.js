getUserIfNeeded(user) {
    if (user.username && user.email) {
        return Promise.resolve(user);
    }
    var where = {};
    if (user.username) {
        where.username = user.username;
    }
    if (user.email) {
        where.email = user.email;
    }

    var query = new RestQuery(this.config, Auth.master(this.config), '_User', where);
    return query.execute().then(function(result){
        if (result.results.length != 1) {
            throw undefined;
        }
        return result.results[0];
    })
}


getOneSchema(className) {
    if (!this.ttl) {
        return Promise.resolve(null);
    }
    return this.cache.get(this.prefix + className).then((schema) => {
        if (schema) {
            return Promise.resolve(schema);
        }
        return this.cache.get(this.prefix + MAIN_SCHEMA).then((cachedSchemas) => {
            cachedSchemas = cachedSchemas || [];
            schema = cachedSchemas.find((cachedSchema) => {
                return cachedSchema.className === className;
            });
            if (schema) {
                return Promise.resolve(schema);
            }
            return Promise.resolve(null);
        });
    });
}

clear() {
    // That clears all caches...
    return this.cache.get(this.prefix + ALL_KEYS).then((allKeys) => {
        if (!allKeys) {
            return;
        }
        const promises = Object.keys(allKeys).map((key) => {
            return this.cache.del(key);
        });
        return Promise.all(promises);
    });
}
