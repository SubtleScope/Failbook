;
; BIND data file for local loopback interface
;
$TTL	604800
@	IN	SOA	failbook.com. root.failbook.com. (
			      8		; Serial
			 604800		; Refresh
			  86400		; Retry
			2419200		; Expire
			 604800 )	; Negative Cache TTL
;
@	IN	NS	failbook.com.
@	IN	A	192.168.1.136
failbook.com	IN	A	192.168.1.136
failbook	IN	A	192.168.1.136
@	IN	A	192.168.0.104
failbook	IN	A	192.168.0.104
failbook.com	IN	A	192.168.0.104
