export function convertToUnit(str, unit = 'px') {
    if (str == null || str === '') {
        return undefined
    } else if (isNaN(+str)) {
        return String(str)
    } else {
        return `${Number(str)}${unit}`
    }
}

export function generateId() {
    return `f${(~~(Math.random() * 1e8)).toString(16)}`;
}