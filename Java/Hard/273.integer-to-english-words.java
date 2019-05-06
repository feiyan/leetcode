/**
 * @desc 需要考虑num在开始或者后续步骤中为0的情形.
 * @url https://leetcode.com/problems/integer-to-english-words/
 * @param {number} num
 * @return {String}
 */
class Solution { 
    public String numberToWords(int num) {
        String words = "";
        do {
            //IF Zero
            if (num == 0) {
                words = "Zero";
                break;
            }
            
            //defined maps
            Map<Integer, String> map = new HashMap<Integer, String>();
            map.put(1, "One");
            map.put(2, "Two");
            map.put(3, "Three");
            map.put(4, "Four");
            map.put(5, "Five");
            map.put(6, "Six");
            map.put(7, "Seven");
            map.put(8, "Eight");
            map.put(9, "Nine");
            map.put(10, "Ten");
            map.put(11, "Eleven");
            map.put(12, "Twelve");
            map.put(13, "Thirteen");
            map.put(14, "Fourteen");
            map.put(15, "Fifteen");
            map.put(16, "Sixteen");
            map.put(17, "Seventeen");
            map.put(18, "Eighteen");
            map.put(19, "Nineteen");
            map.put(20, "Twenty");
            map.put(30, "Thirty");
            map.put(40, "Forty");
            map.put(50, "Fifty");
            map.put(60, "Sixty");
            map.put(70, "Seventy");
            map.put(80, "Eighty");
            map.put(90, "Ninety");
            
            //if less than 20
            if (num < 20) {
                words = map.get(num);
                break;
            }
            
            //others
            int[] dividends = {1000000000, 1000000, 1000, 100, 1};
            String[] dividendWords = {"Billion", "Million", "Thousand", "Hundred", ""};
            for (int i=0; i<5; i++) {
                int dividend = dividends[i];
                if (num >= dividend) {
                    int ret = num / dividend;
                    if (ret >= 100) {
                        int hundredCount = ret / 100;
                        words += map.get(hundredCount )+ " Hundred ";
                        ret %= 100;
                    }
                    if (ret >= 20) {
                        int a = ret % 10;
                        int b = ret - a;
                        words += map.get(b) + " ";
                        if (a > 0) {
                            words += map.get(a) + " ";
                        }
                    } else if (ret > 0) {
                        words += map.get(ret) + " ";
                    }
                    words += dividendWords[i] + " ";
                    num %= dividend;
                }
            }
        } while(false);
        return words.trim();
    }
}
