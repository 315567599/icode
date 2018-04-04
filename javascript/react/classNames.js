const cls = classNames(styles.avatarItem, {
    [styles.avatarItemLarge]: size === 'large',
    [styles.avatarItemSmall]: size === 'small',
    [styles.avatarItemMini]: size === 'mini',
  });

<li className={cls} onClick={onClick} >

-------------------------------------------------------
const scrollNumberCls = classNames({
    [`${prefixCls}-dot`]: isDot,
      [`${prefixCls}-count`]: !isDot,
});
const badgeCls = classNames(className, prefixCls, {
    [`${prefixCls}-status`]: !!status,
      [`${prefixCls}-not-a-wrapper`]: !children,
});

warning(
        !(children && status), '`Badge[children]` and `Badge[status]` cannot be used at the same time.',
       );

const scrollNumber = hidden ? null : (
        <ScrollNumber
        data-show={!hidden}
        className={scrollNumberCls}
        count={displayCount}
        title={count}
        style={style}
        />
        );
