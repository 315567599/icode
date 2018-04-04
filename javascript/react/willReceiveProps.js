componentWillReceiveProps(nextProps) {
    if ('value' in nextProps) {
        this.setState({
            data: nextProps.value,
        });
    }
}
getRowByKey(key) {
    return this.state.data.filter(item => item.key === key)[0];
}
