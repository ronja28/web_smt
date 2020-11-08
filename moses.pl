#!/usr/bin/perl -w
use warnings;
use strict;
$|++;
use IO::Socket::INET;
use IPC::Open2;
my $MOSES = '/home/ronja/smt/mosesdecoder/bin/moses';
my $MOSES_INI = '/home/ronja/smt/corpus/3gram/backoff/id-sb/model/moses.ini';
die "usage: moses.pl <hostname> <port>" unless (@ARGV == 2);
my $LISTEN_HOST = shift;
my $LISTEN_PORT = shift;
my ($MOSES_IN, $MOSES_OUT);
my $pid = open2 ($MOSES_OUT, $MOSES_IN, $MOSES, '-f', $MOSES_INI);

#open server socket
my $server_sock = new IO::Socket::INET (LocalAddr => $LISTEN_HOST, LocalPort => $LISTEN_PORT, Listen => 1) || die "Can't bind server socket";
while (my $client_sock = $server_sock->accept){
	while (my $line = <$client_sock>){
		print $MOSES_IN $line;
		$MOSES_IN->flush ();
		print $client_sock scalar <$MOSES_OUT>;
	}
	$client_sock->close ();
}
