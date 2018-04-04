const { selectedRowKeys, totalCallNo } = this.state;
const { data: { list, pagination }, loading } = this.props;
const status = ['关闭', '运行中', '已上线', '异常'];
text: status[0],

