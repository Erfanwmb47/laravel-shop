class complexNumber {
    constructor(firstNum, secondNum) {
        this.firstNum = firstNum;
        this.secondNum = secondNum;
    }
    sum(){
        const n1 =  this.firstNum.replace('i','').split("+");
        const n2 =  this.secondNum.replace('i','').split("+");
       return Number(n1[0])+Number(n2[0])+'+'+(Number(n1[1])+Number(n2[1]))+'i';
    }
    multiple(){
        const n1 =  this.firstNum.replace('i','').split("+");
        const n2 =  this.secondNum.replace('i','').split("+");

        return (Number(n1[0])*Number(n2[0]))+'+'+(

            (Number(n1[0])*Number(n2[1])+Number(n1[1])*Number(n2[0]))+'i'

        )+'+'+(Number(n1[1]*Number(n2[1]))) + 'i^2';
    }
}


