/**
 * @url https://leetcode.com/problems/power-of-four
 * @difficulty hard
 * @param {number[]} ratings
 * @return {number}
 */
var candy = function(ratings) {
    var length = ratings.length;
    var arr = [];

    //init the minimum number
    for( var i=0; i<length; i++ ){
        arr[i] = 1;
    }

    //from left to right
    for( var i=1; i<length; i++ ){
        if( ratings[i]>ratings[i-1] ){
            arr[i] = arr[i-1]+1;
        }
    }

    //from right to left
    for( var i=length-2; i>=0; i-- ){
        if( ratings[i]>ratings[i+1] ){
            var newVal = arr[i+1]+1; 
            arr[i] = arr[i]>=newVal ? arr[i] : newVal;
        }
    }

    //output total
    var total = 0;
    for( var i in arr ){
        total += arr[i];
    }
    return total;
};