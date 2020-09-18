
func missingNumber(nums []int) int {
    mid, l, r := 0, 0, len(nums) - 1
    for l <= r {
        mid = (l + r) / 2
        fmt.Println(l, r, mid)
        if nums[mid] > mid {
            r = mid - 1
        } else if nums[mid] == mid {
            l = mid + 1
        }
    }
    return l
}
