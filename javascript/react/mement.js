import moment from 'moment';

componentWillReceiveProps(nextProps) {
    // clean state
    if (nextProps.selectedRows.length === 0) {
      this.setState({
        selectedRowKeys: [],
        totalCallNo: 0,
      });
    }
}

render: val => <span>{moment(val).format('YYYY-MM-DD HH:mm:ss')}</span>,


const targetTime = new Date().getTime() + 3900000;
