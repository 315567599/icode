const scrollToField = (fieldKey) => {
    const labelNode = document.querySelector(`label[for="${fieldKey}"]`);
    if (labelNode) {
        labelNode.scrollIntoView(true);
    }
};


const errorList = Object.keys(errors).map((key) => {
    if (!errors[key]) {
        return null;
    }
    return (
        <li key={key} className={styles.errorListItem} onClick={() => scrollToField(key)}>
        <Icon type="cross-circle-o" className={styles.errorIcon} />
        <div className={styles.errorMessage}>{errors[key][0]}</div>
        <div className={styles.errorField}>{fieldLabels[key]}</div>
        </li>
        );
});
