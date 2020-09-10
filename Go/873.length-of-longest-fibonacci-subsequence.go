// 方法1： 暴力判断
func lenLongestFibSubseq(A []int) int {
    total := len(A)
    m := make(map[int]int, total)
    for _, val := range A {
        m[val] = 1
    }
    max := 0
    for i := 0; i < total; i ++ {
        for j := i+1; j < total; j ++ {
            a, b := A[j], A[i] + A[j]
            count := 2
            flag := true
            for flag {
               if _, ok := m[b]; ok {
                    a, b = b, a + b
                    count ++
               } else {
                   flag = false
               }
            }
            if count >= 3 && count > max {
                max = count
            }
        } 
    }
    return max
}
