echo "input:";
iptables -n -v -L INPUT -x -t filter |grep -i 'dpt:' |awk -F' ' '{print $10,$2}'
echo "output:"
iptables -n -v -L OUTPUT -x -t filter |grep -i 'spt:' |awk -F' ' '{print $10,$2}'
echo "checkend"
iptables -Z