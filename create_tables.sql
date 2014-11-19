CREATE TABLE IF NOT EXISTS `Spécialités` (
  `Code CIS` int(8) NOT NULL DEFAULT '0',
  `Dénomination du médicament` varchar(262) DEFAULT NULL,
  `Forme pharmaceutique` varchar(88) DEFAULT NULL,
  `Voies d'administration` varchar(133) DEFAULT NULL,
  `Statut administratif de l’autorisation de mise sur le marché` varchar(22) DEFAULT NULL,
  `Type de procédure d'autorisation de mise sur le marché` varchar(37) DEFAULT NULL,
  `Etat de commercialisation` varchar(19) DEFAULT NULL,
  `Date d’AMM` varchar(20) DEFAULT NULL,
  `StatutBdm` varchar(22) DEFAULT NULL,
  `Numéro de l’autorisation européenne` varchar(11) DEFAULT NULL,
  `Titulaire` varchar(62) DEFAULT NULL,
  `Surveillance renforcée` varchar(3) DEFAULT NULL,
  `COL 13` varchar(13) DEFAULT NULL,
  `COL 14` varchar(3) DEFAULT NULL,
   INDEX (`Code CIS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `Conditions de prescription et de délivrance` (
  `Code CIS` int(8) DEFAULT NULL,
  `Condition de prescription ou de délivrance` varchar(184) DEFAULT NULL,
  KEY `Code CIS` (`Code CIS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
