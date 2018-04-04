render() {
    const { prefixCls, separator, children, ...restProps } = this.props;
    let link;
    if ('href' in this.props) {
        link = <a className={`${prefixCls}-link`} {...restProps}>{children}</a>;
    } else {
        link = <span className={`${prefixCls}-link`} {...restProps}>{children}</span>;
    }
    if (children) {
        return (
                <span>
                {link}
                <span className={`${prefixCls}-separator`}>{separator}</span>
                </span>
               );
    }
    return null;
}
