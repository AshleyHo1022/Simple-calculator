const buttonAC = document.getElementById("AC");
const buttonChange = document.getElementById("change");
const buttonPercentage = document.getElementById("percentage");
const buttonDivided = document.getElementById("divided");
const button7 = document.getElementById("7");
const button8 = document.getElementById("8");
const button9 = document.getElementById("9");
const buttonCross = document.getElementById("cross");
const button4 = document.getElementById("4");
const button5 = document.getElementById("5");
const button6 = document.getElementById("6");
const buttonMinus = document.getElementById("minus");
const button1 = document.getElementById("1");
const button2 = document.getElementById("2");
const button3 = document.getElementById("3");
const buttonPlus = document.getElementById("plus");
const button0 = document.getElementById("0");
const buttonDot = document.getElementById("dot");
const buttonEqual = document.getElementById("equal");

const displayValElement = document.getElementById("output");
const displayValElement2 = document.getElementById("output2");

const displayData = document.getElementsByClassName("calData");

let calcNumBtns = document.getElementsByClassName("buttonNum");
let calcNumBtnZero = document.getElementsByClassName("buttonZero");
let calcOperatorBtns = document.getElementsByClassName("buttonFunction");
let calcOperatorEqual = document.getElementsByClassName("buttonEqual");
let calcOperatorAC = document.getElementsByClassName("buttonClear");


let displayVal = ""; 
let displayVal2 = "0";
let pendingVal = ""; 
let evalStringArray = []; 
 
let updateDisplayVal = (clickObj) =>{ 
    let btnText = clickObj.target.innerHTML; 
    if(displayVal === "0"){
        displayVal = '';
    }
    
    displayVal += btnText;
    displayValElement.innerHTML = displayVal;
    displayValElement2.innerHTML = displayVal2;
}
let performOperation = (clickObj) => {
    //置換
    const str = displayValElement.innerHTML;
    const result = str.replace('x', '*').replace('÷', '/').replace('%', '/100');

    let evaluation = eval(result); 

    displayVal = evaluation + ''; 
    displayValElement2.innerText = displayVal;
} //let performOperation

for(let i=0; i<calcNumBtns.length; i++){
calcNumBtns[i].addEventListener("click", updateDisplayVal, false)
}
for(let i=0; i<calcNumBtnZero.length; i++){
calcNumBtnZero[i].addEventListener("click", updateDisplayVal, false)
}
for(let i=0; i<calcOperatorBtns.length; i++){
calcOperatorBtns[i].addEventListener("click", updateDisplayVal, false)
}


//ACを押してゼロになる
buttonAC.onclick = () => {
    displayVal = "0";
    displayValElement.innerHTML = displayVal;

    displayValElement2.innerHTML = "0";
}


//点
buttonDot.onclick = () => {
    if(!displayVal.includes('.')){ 
        displayVal +="."; 
    }
    displayValElement.innerText = displayVal; 
}

//イコール
buttonEqual.onclick = () => {
    performOperation();
    
    //表示されている計算式をhiddenのoutputにセットする
    //formをsubmitする    
    var output = displayValElement.innerHTML;
    document.getElementById("output_input").value = output;
    
    var output2 = displayValElement2.innerHTML;
    document.getElementById("output2_input").value = output2;    
    
    document.outputForm.submit();
}

//計算記録の表示
/*let recallData = (clickObj) =>{
    let btnTextData = clickObj.target.innerHTML;
    
    displayVal = btnTextData;
    displayValElement.innerHTML = displayVal;
    displayValElement2.innerHTML = displayVal2;
}*/

for(let i=0; i<displayData.length; i++){
displayData[i].addEventListener("click", updateDisplayVal, false)
}



