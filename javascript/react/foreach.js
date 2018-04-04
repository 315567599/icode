var ary = [12,23,24,42,1];
var res = ary.forEach(function (item,index,input) {
         input[index] = item*10;
})

var ary = [12,23,24,42,1];
var res = ary.map(function (item,index,input) {
         return item*10;
})
----------------------------------------------------------
let dcrumb = '';
Object.keys(breadcrumbNameMap).forEach((item) => {
    const itemRegExpStr = `^${item.replace(/:[\w-]+/g, '[\\w-]+')}$`;
    const itemRegExp = new RegExp(itemRegExpStr);
    if (itemRegExp.test(url)) {
        breadcrumb = breadcrumbNameMap[item];
    }
});

const checkedTags = children
      .filter(child => this.isTagSelectOption(child))
      .map(child => child.props.value);


key: `tag-select-${child.props.value}`,

<a className={styles.trigger} onClick={this.handleExpand}>
              {expand ? '收起' : '展开'} <Icon type={expand ? 'up' : 'down'} />
            </a>


----------------------
getMenuData = (data, parentPath) => {
    let arr = [];
    data.forEach((item) => {
        if (item.children) {
            arr.push({ path: `${parentPath}/${item.path}`, name: item.name});
            arr = arr.concat(this.getMenuData(item.children, `${parentPath}/${item.path}`));
        }
    });
    return arr;
}

var arr1 = ['a', 'b', 'c'];
var arr2 = ['d', 'e', 'f'];
var arr3 = arr1.concat(arr2);
// arr3 is a new array [ "a", "b", "c", "d", "e", "f" ]
----------------------


onChange = (key) => {
    if (this.props.onTabChange) {
        this.props.onTabChange(key);
    }
};
getBreadcrumbProps = () => {
    return {
            routes: this.props.routes || this.context.routes,
            params: this.props.params || this.context.params,
            location: this.props.location || this.context.location,
            breadcrumbNameMap: this.props.breadcrumbNameMap || this.context.breadcrumbNameMap,
    };
};

----------------------------------------------------------------------
const formatWan = (val) => {
  const v = val * 1;
  const s = s + '';
  if (!v || isNaN(v)) return '';

  let result = val;
  if (val > 10000) {
    result = Math.floor(val / 10000);
    result = <span>{result}<em className={styles.wan}>万</em></span>;
  }
  return result;
};

------------------------------------------------------------------------------------------------

