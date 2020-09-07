<?php
/**
 * 原题给的K值范围很小，所以暴力破解也是可以的。
 * 但是正确的做法还是根据递增规律，二分查找
 */

func findKthPositive(arr []int, k int) int {
    if arr[0] > k {
        return k
    }
    total := len(arr)
    left, right := 0, total
    for left < right {
        mid := (left + right) / 2
        curr := 1000000
        if mid < total {
            curr = arr[mid]
        }
        if curr - mid - 1 >= k {
            right = mid
        } else {
            left = mid + 1
        }
    }
    return k + left
}
