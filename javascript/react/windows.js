getCurrentScrollTop = () => {
    const getTarget = this.props.target || getDefaultTarget;
    const targetNode = getTarget();
    if (targetNode === window) {
        return window.pageYOffset || document.body.scrollTop || document.documentElement.scrollTop;
    }
    return (targetNode as HTMLElement).scrollTop;
}

setScrollTop(value: number) {
    const getTarget = this.props.target || getDefaultTarget;
    const targetNode = getTarget();
    if (targetNode === window) {
        document.body.scrollTop = value;
        document.documentElement.scrollTop = value;
    } else {
        (targetNode as HTMLElement).scrollTop = value;
    }
}

function getDefaultTarget() {
    return window;
}


