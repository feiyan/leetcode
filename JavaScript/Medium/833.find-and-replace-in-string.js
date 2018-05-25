/**
 * @URL https://leetcode.com/problems/find-and-replace-in-string
 * @param {string} S
 * @param {number[]} indexes
 * @param {string[]} sources
 * @param {string[]} targets
 * @return {string}
 */
var findReplaceString = function(S, indexes, sources, targets) {
    var length = indexes.length;
    var arr = S.split('');
    for( var i=0; i<length; i++ ){
        var index = indexes[i];
        var source = sources[i];
        var target = targets[i];
        var findStr = S.substr(index, source.length);
        if( findStr==source ){
            var sourceLength = source.length;
            for( var j=index; j<index+sourceLength ; j++ ){
                if( j==index ){
                    arr[j] = target
                } else {
                    arr[j] = '';
                }
            }
        }
    }
    return arr.join('');
};