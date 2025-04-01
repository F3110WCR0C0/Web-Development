CREATE TABLE `credit_cards` (
  id int(11) NOT NULL,
  type varchar(8) NOT NULL,
  name varchar(64) NOT NULL,
  number varchar(16) NOT NULL,
  exp_month int(2) NOT NULL,
  exp_year int(4) NOT NULL
) ENGINE=InnoDB;

INSERT INTO credit_cards (id, type, name, number, exp_month, exp_year) VALUES
(1, 'visa', 'Joe Bloggs',   '1234567890123456', '02', '2026'),
(2, 'mcrd', 'Jirou Bloggs', '2345678901234567', '03', '2027'),
(3, 'amex', 'Jamie Bloggs', '3456789012345678', '04', '2028'),
(4, 'disc', 'Jamal Bloggs', '4567890123456789', '05', '2029'),
(5, 'visa', 'Jeong Bloggs',  '5678901234567890', '06', '2026');

ALTER TABLE credit_cards
  ADD PRIMARY KEY (id);

ALTER TABLE credit_cards
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
