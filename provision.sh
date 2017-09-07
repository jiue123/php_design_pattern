echo '*******************'
echo 'config OS'
echo '*******************'
echo -e 'ZONE="Asia/Tokyo"\nUTC=false' > /etc/sysconfig/clock
ln -sf  /usr/share/zoneinfo/Asia/Ho_Chi_Minh /etc/localtime
echo -e 'LANG="en_US.UTF-8"\nSYSFONT="latarcyrheb-sun16"' > /etc/sysconfig/i18n
LANG="en_US.UTF-8"
SYSFONT="latarcyrheb-sun16"

WEB_ROOT=/var/www/web
#config apache
echo '*******************'
echo 'config apache'
echo '*******************'
cp /vagrant/os/* / -rf
rm -f /etc/httpd/sites-enabled/*
ln -s /etc/httpd/sites-available/000localhost.conf /etc/httpd/sites-enabled/000localhost.conf

yum install -y deltarpm

yum install -y epel-release

yum update -y

yum groupinstall "Development tools"

yum -y install git wget net-tools

rpm -Uvh https://dl.fedoraproject.org/pub/epel/epel-release-latest-7.noarch.rpm
rpm -Uvh https://mirror.webtatic.com/yum/el7/webtatic-release.rpm

yum update -y

yum install -y php70w php70w-opcache php70w-mysql.x86_64 php70w-mbstring.x86_64 php70w-xml.x86_64 php70w-pdo.x86_64 mariadb-server

systemctl enable mariadb
systemctl start mariadb

echo 'cd /vagrant' >> /home/vagrant/.bashrc
echo '/usr/sbin/setenforce 0' >> /home/vagrant/.bashrc
echo '/usr/sbin/setenforce 0' >> /root/.bashrc