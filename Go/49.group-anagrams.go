// 1. 利用排序的字符串作为键值

func groupAnagrams(strs []string) [][]string {
    data := make(map[string][]string)
    for _, str := range strs {
        byteArr := []byte(str)
        keys := make(sort.StringSlice, bytes.Count(byteArr, nil))
        for i, c := range byteArr {
            keys[i] = string(c)
        }
        sort.Sort(keys)
        key := ""
        for _, s := range keys {
            key += s
        }
        data[key] = append(data[key], str)
    }
    ret := make([][]string, len(data))
    i := 0
    for _, subs := range data {
        ret[i] = subs
        i++
    }
    return ret
}
