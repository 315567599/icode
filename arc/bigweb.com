nginx+memcached构建页面缓存应用 :http://www.open-open.com/lib/view/open1377777147386.html

. 如果是用户头像的应用，用memcached来做缓存也不合适。因为用户更改头像又得刷新缓存，鉴于此，一步到位的用ttserver或mongodb GridFS来做用户头像的存储岂不是更好么。

