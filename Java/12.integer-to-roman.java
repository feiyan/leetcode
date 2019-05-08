/**
 * @url https://leetcode.com/problems/roman-to-integer/
 * @param {number} n
 * @return {String}
 */
class Solution {
    //第一版比较简单的实现
    public String intToRoman(int num) {
        Map<Integer, String> map = new HashMap<Integer, String>();
        map.put(1, "I");
        map.put(4, "IV");
        map.put(5, "V");
        map.put(9, "IX");
        map.put(10, "X");
        map.put(40, "XL");
        map.put(50, "L");
        map.put(90, "XC");
        map.put(100, "C");
        map.put(400, "CD");
        map.put(500, "D");
        map.put(900, "CM");
        map.put(1000, "M");
        
        //sort
        List<Map.Entry<Integer, String>> list = new ArrayList<Map.Entry<Integer, String>>(map.entrySet());
        Collections.sort(list, new Comparator<Map.Entry<Integer, String>>() {
            public int compare(Map.Entry<Integer, String> mapping1, Map.Entry<Integer, String> mapping2) {
                return mapping2.getKey().compareTo(mapping1.getKey());
            }
        });
        
        //output
        String ret = "";
        for (Map.Entry<Integer, String> mapping : list) {
            if (num <= 0) {
                continue;
            }
            int key = mapping.getKey();
            String val = mapping.getValue();
            if (num >= key) {
                if (val.length() == 1) {
                    int count = num / key;
                    for (int i=0; i<count; i++) {
                        ret += val;
                    }
                    num -= key*count;
                } else {
                    ret += val;
                    num -= key;
                }
            }
        }
        
        return ret;
    }
}
