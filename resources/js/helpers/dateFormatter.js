export const dateFunction = ()=> {
    let today = new Date();
    let formattedDate = today.toLocaleDateString();
    let months = 3;
    today.setMonth(today.getMonth() + months);
    let datePlus3Months = today.toISOString().substring(0,10);
    return datePlus3Months;
};