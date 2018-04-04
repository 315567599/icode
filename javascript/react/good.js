const primaryColor = '#2F9CFF';
const backgroundColor = '#F0F2F5';

componentWillReceiveProps(nextProps) {
    if (!equal(this.props, nextProps)) {
        setTimeout(() => {
            this.renderChart(nextProps);
        }, 10);
    }
}

componentWillUnmount() {
    if (this.chart) {
        this.chart.destroy();
    }
}

const { title, color = primaryColor } = nextProps || this.props;

-------------------------------------------------------------
handleRef = (n) => {
    this.node = n;
}
if (this.node) {
    this.node.innerHTML = '';
}
render() {
    return (
            <div ref={this.handleRef} />
           );
}
---------------------------------------------------------------

const route = cloneDeep(navData.filter(item => item.layout === path)[0]);

item.path = `${parentPath}/${item.path || ''}`.replace(/\/+/g, '/');

const getValue = obj => Object.keys(obj).map(key => obj[key]).join(',');

<Icon style={{ color: '#f5222d', marginRight: 8 }} type="close-circle-o" />您的账户已被冻结</Icon>

const paramsKeys = Object.keys(params).join('|');







