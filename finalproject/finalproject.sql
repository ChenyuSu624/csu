--
-- Database: `final_project`
--
-----------------------------------------------------
--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `adminId` int(2) NOT NULL AUTO_INCREMENT,
  `firstname`varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `username` varchar(8) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`adminId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;




INSERT INTO `admin` (`adminId`, `firstname`, `lastname`, `username`, `password`) 
VALUES (NULL, 'Chenyu', 'Su', 'ChenyuSu', SHA1('ChenyuSu')), 
        (NULL, 'Admin', 'Admin', 'admin', SHA1('secret'));
------------------------------------------------------
--
-- Table structure for table `firearm_category`
--
CREATE TABLE IF NOT EXISTS `firearm_category` (
  `catId` int(5) NOT NULL AUTO_INCREMENT,
  `catName`varchar(25) NOT NULL,
  PRIMARY KEY (`catId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO `firearm_category` (`catId`, `catName`) 
        VALUES (NULL, 'Handgun'), (NULL, 'Shotgun'),(NULL, 'Rifle'),(NULL, 'Machinegun');
        
        
---------------------------------------------------------------
--
-- Table structure for table `firearm_caliber`
--

CREATE TABLE IF NOT EXISTS `firearm_caliber` (
  `calId` int(8) NOT NULL AUTO_INCREMENT,
  `calName`varchar(25) NOT NULL,
  PRIMARY KEY (`calId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO `firearm_caliber` (`calId`, `calName`) 
        VALUES (NULL, '9MM'), (NULL, '5.56 NATO'),(NULL, '7.62 NATO'),(NULL, '12 Gauge'),(NULL, '22 Long Rifle'),(NULL, '40 S&W');
---------------------------------------------------------------
--
-- Table structure for table `firearm_product`
--
CREATE TABLE IF NOT EXISTS `firearm_product` (
  `Id` int(100) NOT NULL AUTO_INCREMENT,
  `Name`varchar(25) NOT NULL,
  `Category`varchar(25) NOT NULL,
  `Image`varchar(25) NOT NULL,
  `Price`decimal(10,2) NOT NULL,
  `Finish`varchar(25) NOT NULL,
  `Action`varchar(25) NOT NULL,
  `Caliber`varchar(25) NOT NULL,
  `Barrel_Length`varchar(25) NOT NULL,
  `Safety`varchar(25) NOT NULL,
  `Rating`varchar(25) NOT NULL,
  `CatId`varchar(25) NOT NULL,
  `CalId`varchar(25) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
-- (NULL, 'Handgun'), (NULL, 'Shotgun'),(NULL, 'Rifle'),(NULL, 'Machinegun');
-- (NULL, '9MM'), (NULL, '5.56 NATO'),(NULL, '7.62 NATO'),(NULL, '12 Gauge'),(NULL, '22 Long Rifle'),(NULL, '40 S&W');

INSERT INTO `firearm_product` (`Name`,`Category`,`Image`,`Price`, `Finish`, `Action`, `Caliber`, `Barrel_Length`, `Safety`, `Rating`,`CatId`,`CalId`) VALUES
('Beretta 92FS','Handgun','Beretta 92FS.jpg',567.00,'Black','Single/Double','9MM','	4.9"','Ambidextrous',4.8,1,1),
('Sig Sauer P320','Handgun','Sig Sauer P320.jpg',875.49,'Nitron','Double Action','9MM','5"','Safe Action',5,1,1),
('CZ 75','Handgun','CZ 75.jpg',620.06,'Black','Single/Double','9MM','4.60"','Manual',4.9,1,1),
('Glock G19 G4','Handgun','Glock19.jpg',521.18,'Black','Safe Action','9MM','4.01"','Safe Action',4.9,1,1),
('H&K VP9 SK','Handgun','VP9 SK.jpg',678.77,'Black','Double Action','9MM','3.39"','Safe Action',5,1,1),
('S&W M&P 15','Rifle','S&W M&P 15.jpg',647.87,'Black','Semi-Automatic','5.56 NATO','16"','Manual Safety on Lower',4.9,3,2),
('Core 15 M4 Rifle','Rifle','Core 15 M4 Rifle.jpg',678.77,'Black','Semi-Automatic','5.56 NATO','16"','Manual',4.6,3,2),
('CBQ SPC A3 223 Remington','Rifle','CBQ SPC A3.jpg',708.64,'Black','Semi-Automatic','5.56 NATO','16"','Lever',5,3,2),
('FN Scar 17S','Rifle','FN Scar 17S.jpg',899.99,'Matte Blued Barrel','Semi-Automatic','7.62 NATO','16"','Lever',5,3,3),
('CIA C308 Rifle','Rifle','CIA C308 Rifle.jpg',613.88,'Black','Semi-Automatic','7.62 NATO','18"','Lever',4.6,3,3),
('MSR10','Rifle','MSR10.jpg',1212.31,'Black','Semi-Automatic','7.62 NATO','16.1"','Lever',4.7,3,3),
('SASS','Rifle','SASS.jpg',1699.50,'Black','Semi-Automatic','7.62 NATO','18"','Manual',5,3,3),
('H&R Pardner Pump Protector','Shotgun','H&R Pardner.jpg',165.83,'Black','Pump','12 Gauge','20"','Cross Bolt',4.9,2,4),
('SDS IMPORTS CHEETAH','Shotgun','SDS.jpg',513.97,'Black','Semi-Automatic','12 Gauge','19"','Manual',4.5,2,4),
('DP-12 Double Barrel Pump Shotgun','Shotgun','DP-12 DBPS.jpg',1328.70,'Black','Pump','12 Gauge','	18.75"','Ambidextrous',5,2,4),
('S&W M&P40','Handgun','S&W M&P40.jpg',380.07,'Black','Striker Fire Action','40 S&W','4.25"','Manual',4.8,1,6),
('H&K P30LS','Handgun','H&K P30LS.jpg',580.92,'Black','	Single/Double','40 S&W','4.44"','Ambidextrous',5,1,6),
('Sig Sauer P229','Handgun','Sig Sauer P229.jpg',1141.24,'Gray','Single/Double','40 S&W','3.9"','Manual',5,1,6),
('Ruger 22LR','Rifle','Ruger 22LR.jpg',333.72,'Black','	Semi-Automatic','22 Long Rifle','	16.1"','Ambidextrous',4.3,3,5),
('Savage MKII FV-SR 22LR ','Rifle','Savage MKII.jpg',239.99,'Blue','Bolt Action','22 Long Rifle','16 1/2"','Three Position',4.8,3,5),
('S&W M&P22','Handgun','S&W M&P22.jpg',353.29,'Black','Single','22 Long Rifle','3.5"','Ambidextrous',4.6,1,5),
('FN M249S','Machinegun','FN M249S.jpg',8959.97,'Flat Dark Earth','Semi-Automatic','5.56 NATO','16.1"','Cross Bolt',4.9,4,2),
('Ruger Mini-14','Rifle','Ruger Mini-14.jpg',822.25,'Black','	Semi-Automatic','5.56 NATO','	16.12"','Manual',4.7,3,2);
-- ('',,'',,'','',,'','',),