timeout: number;
delayTimeout: number;

componentWillReceiveProps(nextProps: ButtonProps) {
    const currentLoading = this.props.loading;
    const loading = nextProps.loading;

    if (currentLoading) {
        clearTimeout(this.delayTimeout);
    }

    if (typeof loading !== 'boolean' && loading && loading.delay) {
        this.delayTimeout = setTimeout(() => this.setState({ loading }), loading.delay);
    } else {
        this.setState({ loading });
    }
}

componentWillUnmount() {
    if (this.timeout) {
        clearTimeout(this.timeout);
    }
    if (this.delayTimeout) {
        clearTimeout(this.delayTimeout);
    }
}


