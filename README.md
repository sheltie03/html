# XSS Vuln Pageの概要
## ディレクトリ構造
+ /
	+ index.html
	+ 1_/
		+ xss1.html
	+ 2_/
		+ xss2.php
		+ xss_confirm.php
		+ xss_register.php
	+ 3_/
		+ test.txt
		+ xss3.html
	+ 4_/
		+ xss4.html
		+ files/
			+ redRebbon.gif

## 脆弱性
+ XSS
+ OSコマンドインジェクション
+ パストラバーサル
+ ディレクトリリスティング
+ ...

## スキャン
### OWASP ZAP
+ XSSの一部が見つけられない
+ パストラバーサルが見つけられない
+ ディレクトリリスティングは見つけられない

## 答え
### XSS
### OSコマンドインジェクション
### パストラバーサル
### ディレクトリリスティング

## 補遺
### 反射型XSSのリンクをつくる
+ 別ページのリンクから脆弱性のあるページに飛ばして、ユーザのWebブラウザ上でjavascriptを実行する
+ [リンク1](http://192.168.179.7/2_/xss2_confirm.php?mail=%3C%2Fform%3E%3Cscript%3Ealert%281%29%3B%3C%2Fscript%3E%3Cform%3E&name=ZAP)
+ [リンク2](http://192.168.179.7/4_/xss4.php?newName=%3C%2Fp%3E%3Cscript%3Ealert%281%29%3B%3C%2Fscript%3E%3Cp%3E&oldName=ZAP)

### OSコマンドインジェクションを確認する
+ pingで自分にICMPパケットを4回送って、tcpdumpで確認する

```
$ sudo tcpdump -i en0 icmp
tcpdump: verbose output suppressed, use -v or -vv for full protocol decode
listening on en0, link-type EN10MB (Ethernet), capture size 262144 bytes
00:21:42.083329 IP 192.168.179.7 > 192.168.179.3: ICMP echo request, id 5279, seq 1, length 64
00:21:42.083391 IP 192.168.179.3 > 192.168.179.7: ICMP echo reply, id 5279, seq 1, length 64
00:21:43.107754 IP 192.168.179.7 > 192.168.179.3: ICMP echo request, id 5279, seq 2, length 64
00:21:43.107811 IP 192.168.179.3 > 192.168.179.7: ICMP echo reply, id 5279, seq 2, length 64
00:21:44.129920 IP 192.168.179.7 > 192.168.179.3: ICMP echo request, id 5279, seq 3, length 64
00:21:44.129981 IP 192.168.179.3 > 192.168.179.7: ICMP echo reply, id 5279, seq 3, length 64
00:21:45.154691 IP 192.168.179.7 > 192.168.179.3: ICMP echo request, id 5279, seq 4, length 64
00:21:45.154767 IP 192.168.179.3 > 192.168.179.7: ICMP echo reply, id 5279, seq 4, length 64
```
