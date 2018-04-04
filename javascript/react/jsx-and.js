import React from 'react';
import classNames from 'classnames';
import styles from './index.less';

export default ({ className, links, copyright }) => {
  const clsString = classNames(styles.globalFooter, className);
  return (
    <div className={clsString}>
      {
        links && (
          <div className={styles.links}>
            {links.map(link => (
              <a
                key={link.title}
                target={link.blankTarget ? '_blank' : '_self'}
                href={link.href}
              >
                {link.title}
              </a>
            ))}
          </div>
        )
      }
      {copyright && <div className={styles.copyright}>{copyright}</div>}
    </div>
  );
};

const scrollNumber = hidden ? null : (
        <ScrollNumber
        data-show={!hidden}
        className={scrollNumberCls}
        count={displayCount}
        title={count}
        style={style}
        />
        );

const statusText = (hidden || !text) ? null : (
        <span className={`${prefixCls}-status-text`}>{text}</span>
        );



{title && <div className={styles.numberInfoTitle}>{title}</div>}
{subTitle && <div className={styles.numberInfoSubTitle}>{subTitle}</div>}

---------------------------------------------------------------------------
componentWillUnmount() {
    clearTimeout(this.timeout);
}
onKeyDown = (e) => {
    if (e.key === 'Enter') {
        this.timeout = setTimeout(() => {
            this.props.onPressEnter(this.state.value); // Fix duplicate onPressEnter
        }, 0);
    }
}
onChange = (value) => {
    this.setState({ value });
    if (this.props.onChange) {
        this.props.onChange();
    }
}
enterSearchMode = () => {
    this.setState({ searchMode: true }, () => {
        if (this.state.searchMode) {
            this.input.focus();
        }
    });
}
leaveSearchMode = () => {
    this.setState({
        searchMode: false,
        value: '',
    });
}
render() {
    const { className, placeholder, ...restProps } = this.props;

----------------------------------------------------------------------------
