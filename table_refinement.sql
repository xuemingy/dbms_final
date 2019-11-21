/*
 Navicat Premium Data Transfer

 Source Server         : mars
 Source Server Type    : MySQL
 Source Server Version : 80018
 Source Host           : localhost:3306
 Source Schema         : finalproject

 Target Server Type    : MySQL
 Target Server Version : 80018
 File Encoding         : 65001

 Date: 20/10/2019 14:37:50
*/

CREATE TABLE custKind (
  custkind_id int(5) NOT NULL,
  kind varchar(20) DEFAULT NULL,
  PRIMARY KEY (custkind_id)
);

CREATE TABLE business (
  customer_id int(5) NOT NULL,
  category varchar(20) DEFAULT NULL,
  grs_an_incm int(20) DEFAULT NULL,
  PRIMARY KEY (customer_id)
);

CREATE TABLE home (
  customer_id int(5) NOT NULL,
  mrg_state varchar(2) DEFAULT NULL,
  gender varchar(1) DEFAULT NULL,
  age int(3) DEFAULT NULL,
  income int(10) DEFAULT NULL,
  PRIMARY KEY (customer_id)
);

CREATE TABLE state (
  state_id int(5) NOT NULL,
  statename varchar(20) DEFAULT NULL,
  PRIMARY KEY (state_id)
);

CREATE TABLE city (
  city_id int(5) NOT NULL,
  cityname varchar(20) DEFAULT NULL,
  state_id int(5) NOT NULL,
  PRIMARY KEY (city_id),
  foreign key (state_id) references state(state_id)
);

-- ----------------------------
-- Table structure for Customers
-- ----------------------------
CREATE TABLE customers (
  customer_id int(5) NOT NULL,
  first_name varchar(20) DEFAULT NULL,
  last_name varchar(20) DEFAULT NULL,
  street varchar(50) DEFAULT NULL,
  city_id int(5) DEFAULT NULL,
  zipcode int(5) DEFAULT NULL,
  custkind_id int(2) DEFAULT NULL,
  PRIMARY KEY (customer_id),
  foreign key (custkind_id) references custKind(custkind_id),
  foreign key (city_id) references city(city_id)
);


CREATE TABLE user (
  user_id int(5) NOT NULL,
  username varchar(20) DEFAULT NULL,
  password varchar(20) DEFAULT NULL,
  customer_id int(5) DEFAULT NULL,
  PRIMARY KEY (user_id),
  foreign key (customer_id) references customers(customer_id)
);

CREATE TABLE admin (
  admin_id int(5) NOT NULL,
  username varchar(20) DEFAULT NULL,
  password varchar(20) DEFAULT NULL,
  PRIMARY KEY (admin_id)
  );



-- ----------------------------
-- Table structure for Products
-- ----------------------------
CREATE TABLE products (
  prod_id int(5) NOT NULL,
  prod_name varchar(20) DEFAULT NULL,
  amount varchar(20) DEFAULT NULL,
  price int(10) DEFAULT NULL,
  cost int(10) DEFAULT NULL,
  rate double(4,3) DEFAULT NULL,
  PRIMARY KEY (prod_id)
);




CREATE TABLE region (
  region_id int(5) NOT NULL,
  region_name varchar(20) NOT NULL,
  region_manager_id int(5) NOT NULL,
  PRIMARY KEY (region_id)
);

-- --------------------------------------------------------

--
-- 表的结构 `Salesperson`
--

CREATE TABLE salesperson (
  sid int(5) NOT NULL,
  first_name varchar(10) NOT NULL,
  last_name varchar(10) NOT NULL,
  street varchar(10) NOT NULL,
  city_id int(5) NOT NULL,
  zipcode int(5) NOT NULL,
  email varchar(15) NOT NULL,
  title int(2) NOT NULL,
  store_id int(5) NOT NULL,
  salary int(5) NOT NULL,
  PRIMARY KEY (sid)
);

-- --------------------------------------------------------

--
-- 表的结构 `Store`
--

CREATE TABLE store (
  store_id int(5) NOT NULL,
  street varchar(20) NOT NULL,
  city_id int(5) NOT NULL,
  manager_id int(5) NOT NULL,
  faculty int(5) NOT NULL,
  region_id int(5) NOT NULL,
  PRIMARY KEY (store_id)
);

-- --------------------------------------------------------

--
-- 表的结构 `transaction`
--

CREATE TABLE transaction (
  order_id int(10) NOT NULL,
  trans_date date NOT NULL,
  total_price int(10) DEFAULT NULL,
  sid int(5) NOT NULL,
  customer_id int(5) NOT NULL,
  amount int(5) NOT NULL,
  PRIMARY KEY (order_id)
) ;


CREATE TABLE trans_prod (
  order_id int(10) NOT NULL,
  prod_id int(5) NOT NULL,
  price int(10) DEFAULT NULL,
  amount int(5) NOT NULL,
  PRIMARY KEY (order_id, prod_id)
);
