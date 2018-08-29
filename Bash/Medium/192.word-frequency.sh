## 
## Write a bash script to calculate the frequency of each word in a text file words.txt.
## https://leetcode.com/problems/word-frequency
## 

awk '{for(i=1;i<=NF;i++){print $i}}' words.txt | sort | uniq -c | sort -nr | awk '{print $2,$1}'