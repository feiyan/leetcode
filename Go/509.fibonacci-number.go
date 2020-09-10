

func fib(N int) int {
    if N < 2 {
        return N
    }
    theDayBeforeYesterday, yesterday, today := 0, 1, 0
    for i := 2; i <= N; i++ {
        today = theDayBeforeYesterday + yesterday
        theDayBeforeYesterday, yesterday = yesterday, today
    }
    return today
}

func fibV2(N int) int {
    if N < 2 {
        return N
    }
    theDayBeforeYesterday := 0
    yesterday := 1
    today := 0
    for i := 2; i <= N; i++ {
        today = theDayBeforeYesterday + yesterday
        theDayBeforeYesterday = yesterday
        yesterday = today
    }
    return today
}

func fibV1(N int) int {
    if N == 0 {
        return 0
    }
    if N == 1 {
        return 1
    }
    theDayBeforeYesterday := 0
    yesterday := 1
    today := 0
    for i := 2; i <= N; i++ {
        today = theDayBeforeYesterday + yesterday
        theDayBeforeYesterday = yesterday
        yesterday = today
    }
    return today
}
