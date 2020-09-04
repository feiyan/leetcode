
// easy题目
// 改进版本
func isAnagram(s string, t string) bool {
    m := make(map[byte]int)
    for _, c := range []byte(s) {
        m[c] ++
    }
    for _, c := range []byte(t) {
        m[c] --
    }
    for c, v := range m {
        if v == 0 {
            delete(m, c)
        }
    }
    return len(m) == 0
}

// 初学者版本
func isAnagram2(s string, t string) bool {
    sArr := []byte(s)
    tArr := []byte(t)
    sLen := bytes.Count(sArr, nil)
    tLen := bytes.Count(tArr, nil)
    if sLen != tLen {
        return false
    }
    letters := make(map[byte]int, sLen)
    for i := 0; i < sLen-1; i ++ {
        charS := sArr[i]
        if _, ok := letters[charS]; !ok {
            letters[charS] = 1
        } else {
            letters[charS] ++
        }
        charT := tArr[i]
        if _, ok := letters[charT]; !ok {
            letters[charT] = -1
        } else {
            letters[charT] --
        }
    }
    for idx, val := range letters {
        if val == 0 {
            delete(letters, idx)
        }
    }
    return len(letters) == 0
}
