from netaddr import *
import sys
import fileinput
import re
iplist = []

for line in fileinput.input(sys.argv[1]):
  ipv4_address = re.compile('(([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.){3}([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])(\/(3[0-2]|[1-2][0-9]|[0-9]))')
  ipv4 = re.search(ipv4_address, line)
  if ipv4:
    iplist.append(ipv4.group(0))

ip_merge_list=cidr_merge(iplist)
for ip in ip_merge_list:
  print(ip)
