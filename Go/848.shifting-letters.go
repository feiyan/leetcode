
func shiftingLetters(S string, shifts []int) string {
    chars := []byte(S)
    curr := 0
    strs := ""
    for i := len(shifts)-1; i >= 0; i-- {
        curr += shifts[i]
        curr = curr % 26
        c := chars[i]
        n := int(c)
        n += curr
        if n > 122 {
            n -= 26
        }
        strs = string(rune(n)) + strs
    } 
    return strs
}
