export const dateFunction = ()=> {
    const today = new Date();
    const formattedDate = today.toLocaleDateString();
    const months = 3;
    today.setMonth(today.getMonth() + months);
    let datePlus3Months = today.toISOString().substring(0,10);
    
    return datePlus3Months;
};