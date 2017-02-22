/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : shopnew

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-02-22 22:09:36
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for web_order
-- ----------------------------
DROP TABLE IF EXISTS `web_order`;
CREATE TABLE `web_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_product_id` varchar(255) DEFAULT NULL,
  `order_customer_name` varchar(255) DEFAULT NULL COMMENT 'Tên khách hàng',
  `order_customer_phone` varchar(255) DEFAULT NULL,
  `order_customer_email` varchar(255) DEFAULT NULL,
  `order_customer_address` varchar(255) DEFAULT NULL,
  `order_customer_note` varchar(255) DEFAULT NULL,
  `order_total_money` int(11) DEFAULT '0' COMMENT 'Tổng tiền đơn hàng',
  `order_total_buy` int(11) DEFAULT NULL COMMENT 'số lượng mua',
  `order_money_ship` int(11) DEFAULT NULL COMMENT 'tiền ship',
  `order_user_shipper_id` int(11) DEFAULT '0' COMMENT 'Người phụ trách đơn hàng',
  `order_user_shipper_name` varchar(255) DEFAULT NULL,
  `order_user_shop_id` int(11) DEFAULT NULL,
  `order_user_shop_name` varchar(255) DEFAULT NULL,
  `order_status` tinyint(5) DEFAULT '1' COMMENT '0:đơn hàng bị xóa1: đơn hàng mới, 2: đơn hàng đã xác nhận, 3:đơn hàng hoàn thành,4: đơn hàng bị hủy',
  `order_type` tinyint(5) DEFAULT '0' COMMENT '0:đơn hàng đặt từ site, 1: dh đặt trong hệ thống bán hàng',
  `order_note` tinytext COMMENT 'note đơn hàng',
  `order_time_pay` int(11) DEFAULT '0' COMMENT 'thời gian thanh toán, hoàn thành',
  `order_time_creater` int(11) DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of web_order
-- ----------------------------
INSERT INTO `web_order` VALUES ('11', '634', 'Nguyễn tien huan', '0902868001', 'nguyentienhuanl@gmail.com', '98-108 cmt8, p.7, q.3, hcm', 'Ngay 18/01/2016 ngay nhan hang', '0', '1', null, '0', null, '32', 'Công ty CP Gilos', '1', '0', null, '0', '1484617031');
INSERT INTO `web_order` VALUES ('12', '634', 'Nguyễn tien huan', '0902868001', 'nguyentienhuanl@gmail.com', '98-108 cmt8, p.7, q.3, hcm', 'Ngay 18/01/2016 ngay nhan hang', '0', '1', null, '0', null, '32', 'Công ty CP Gilos', '1', '0', null, '0', '1484617048');
INSERT INTO `web_order` VALUES ('13', '658', 'Nguyễn thị thu ', '0972179586', '', 'Số nha51 thôn bến Trung, xã Bắc hồng , huyện Đông Anh Hà nội', '', '0', '1', null, '0', null, '63', 'Sữa non T470', '1', '0', null, '0', '1485356198');
INSERT INTO `web_order` VALUES ('14', '802', 'Lê Hằng', '0932366081', '', '521 kim mã', 'Giao hàng h hành chính', '0', '8', null, '0', null, '74', 'Đồ Gia Dụng ', '1', '0', null, '0', '1486874186');
INSERT INTO `web_order` VALUES ('15', '865', 'Hải Nam', '0913922986', 'nguyenduypt86@gmail.com', '483 Nguyễn Khang Cầu giấy Hà Nội', 'Test đơn nhận mail.', '0', '1', null, '0', null, '55', 'Siêu thị gia đình', '1', '0', null, '0', '1487303589');
INSERT INTO `web_order` VALUES ('16', '865', 'Hải Nam', '0913922986', 'nguyenduypt86@gmail.com', '483 Nguyễn Khang Cầu giấy Hà Nội', 'Testing...', '0', '1', null, '0', null, '55', 'Siêu thị gia đình', '1', '0', null, '0', '1487304103');

-- ----------------------------
-- Table structure for web_order_item
-- ----------------------------
DROP TABLE IF EXISTS `web_order_item`;
CREATE TABLE `web_order_item` (
  `order_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT '0' COMMENT 'ID đơn hàng',
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_price_sell` int(11) DEFAULT NULL,
  `product_price_input` int(11) DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `product_category_id` int(11) DEFAULT NULL,
  `product_category_name` varchar(255) DEFAULT NULL,
  `product_type_price` tinyint(5) DEFAULT '1' COMMENT 'kiểu hiển thị tiền của SP: 1: hiên thị giá, 2: liên hệ shop',
  `product_province` tinyint(11) DEFAULT NULL COMMENT 'tỉnh thành của sản phẩm',
  `product_provider` int(10) DEFAULT NULL COMMENT 'ID nhà cung cấp',
  `number_buy` int(10) DEFAULT '0' COMMENT 'Số lượng đặt mua',
  `order_item_pay` tinyint(5) DEFAULT '0' COMMENT '0: chưa thanh toán, 1 đã thanh toán, 2: hoàn trả',
  `order_item_time_pay` int(11) DEFAULT NULL COMMENT 'thời gian thanh toán',
  `order_item_status` tinyint(5) DEFAULT '1' COMMENT '0:đơn hàng bị xóa1: đơn hàng mới, 2: đơn hàng đã xác nhận, 3:đơn hàng hoàn thành,4: đơn hàng bị hủy',
  `order_item_time_creater` int(11) DEFAULT NULL,
  PRIMARY KEY (`order_item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of web_order_item
-- ----------------------------
INSERT INTO `web_order_item` VALUES ('2', '11', '718', 'Pharysol điều trị viêm họng viêm thanh quản, amidan dứt điểm', '185000', null, '1474445490-pharysol-moi.png', '196', 'Thực phẩm chức năng', '1', null, null, '0', '0', null, '3', '1476276124');
INSERT INTO `web_order_item` VALUES ('5', '11', '619', 'Xi nước đánh giày thể thao GoldCare - GC 2006 Sport', '55000', null, '05-30-17-20-06-2016-gc2006-sporttrang-01.jpg', '139', 'Giày dép, túi sách Nam', '1', null, null, '0', '0', null, '1', '1476634572');
INSERT INTO `web_order_item` VALUES ('6', '11', '634', 'Cây xỏ giày GoldCare - GC7003', '20000', null, '01-45-43-21-06-2016-dsc6901.jpg', '139', 'Giày dép, túi sách Nam', '1', null, null, '0', '0', null, '1', '1481040069');
INSERT INTO `web_order_item` VALUES ('7', '12', '632', 'Xi nước đánh giày GoldCare - GC 2002', '55000', null, '11-45-07-21-06-2016-gc2002den-1.jpg', '139', 'Giày dép, túi sách Nam', '1', null, null, '0', '0', null, '1', '1481773494');
INSERT INTO `web_order_item` VALUES ('8', '12', '626', 'Xi sáp đánh giày GoldCare - GC 5003', '39000', null, '10-41-36-21-06-2016-gc-5003.jpg', '119', 'Phụ kiện thời trang Nam', '1', null, null, '0', '0', null, '1', '1482632062');
INSERT INTO `web_order_item` VALUES ('9', '13', '634', 'Cây xỏ giày GoldCare - GC7003', '20000', null, '01-45-43-21-06-2016-dsc6901.jpg', '139', 'Giày dép, túi sách Nam', '1', null, null, '0', '0', null, '1', '1484616998');
INSERT INTO `web_order_item` VALUES ('10', '13', '634', 'Cây xỏ giày GoldCare - GC7003', '20000', null, '01-45-43-21-06-2016-dsc6901.jpg', '139', 'Giày dép, túi sách Nam', '1', null, null, '0', '0', null, '1', '1484617013');
INSERT INTO `web_order_item` VALUES ('11', '13', '634', 'Cây xỏ giày GoldCare - GC7003', '20000', null, '01-45-43-21-06-2016-dsc6901.jpg', '139', 'Giày dép, túi sách Nam', '1', null, null, '0', '0', null, '1', '1484617031');
INSERT INTO `web_order_item` VALUES ('12', '14', '634', 'Cây xỏ giày GoldCare - GC7003', '20000', null, '01-45-43-21-06-2016-dsc6901.jpg', '139', 'Giày dép, túi sách Nam', '1', null, null, '0', '0', null, '1', '1484617048');
INSERT INTO `web_order_item` VALUES ('13', '14', '658', 'T470 Pedia 400g', '200000', null, '02-15-32-29-06-2016-125034041210531068957195315420058n.jpg', '174', 'Sữa & Bột', '1', null, null, '0', '0', null, '1', '1485356198');
INSERT INTO `web_order_item` VALUES ('14', '14', '802', 'HŨ THỦY TINH KOVA-STARLOCK 2.1L', '95000', null, '1476951578-img8770.png', '92', 'Vật dụng nhà bếp', '1', null, null, '0', '0', null, '1', '1486874186');
INSERT INTO `web_order_item` VALUES ('15', '14', '865', 'SỮA BỘT DEVONDALE FULL CREAM: (Nguyên kem)', '320000', null, '1486827801-image.jpg', '196', 'Thực phẩm chức năng', '1', null, null, '0', '0', null, '1', '1487303589');
INSERT INTO `web_order_item` VALUES ('16', '0', '865', 'SỮA BỘT DEVONDALE FULL CREAM: (Nguyên kem)', '320000', null, '1486827801-image.jpg', '196', 'Thực phẩm chức năng', '1', null, null, '0', '0', null, '1', '1487304103');
