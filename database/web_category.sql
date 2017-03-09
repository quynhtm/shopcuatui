/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : shopnew

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-03-09 11:30:04
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for web_category
-- ----------------------------
DROP TABLE IF EXISTS `web_category`;
CREATE TABLE `web_category` (
  `category_id` smallint(5) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_parent_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `category_depart_id` int(12) DEFAULT NULL,
  `category_type` tinyint(2) DEFAULT '0' COMMENT 'loại danh mục',
  `category_level` tinyint(2) DEFAULT '1' COMMENT 'cấp danh mục',
  `category_image_background` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_icons` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_status` tinyint(1) DEFAULT '0',
  `category_order` tinyint(5) DEFAULT '0',
  PRIMARY KEY (`category_id`),
  KEY `status` (`category_status`) USING BTREE,
  KEY `id_parrent` (`category_parent_id`,`category_status`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=254 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of web_category
-- ----------------------------
INSERT INTO `web_category` VALUES ('5', 'Phụ kiện công nghệ', '43', null, '0', '1', null, null, '1', '0');
INSERT INTO `web_category` VALUES ('26', 'test danhmuc', '21', null, '0', '1', null, null, '0', '0');
INSERT INTO `web_category` VALUES ('27', 'Đồ điện gia dụng', '86', null, '0', '1', null, null, '1', '0');
INSERT INTO `web_category` VALUES ('41', 'Mẹ và bé', '0', null, '1', '1', null, null, '1', '4');
INSERT INTO `web_category` VALUES ('42', 'Điện máy', '43', null, '0', '1', null, null, '1', '0');
INSERT INTO `web_category` VALUES ('43', 'Điện tử công nghệ', '0', null, '1', '1', null, null, '1', '3');
INSERT INTO `web_category` VALUES ('44', 'Điện thoại', '43', null, '0', '1', null, null, '1', '0');
INSERT INTO `web_category` VALUES ('50', 'Điện lạnh', '86', null, '0', '1', null, null, '1', '0');
INSERT INTO `web_category` VALUES ('53', 'Đồ dùng cho mẹ', '41', null, '1', '1', null, null, '1', '11');
INSERT INTO `web_category` VALUES ('56', 'Dinh dưỡng cho mẹ', '41', null, '1', '1', null, null, '1', '10');
INSERT INTO `web_category` VALUES ('81', 'Tivi, Video & Âm thanh', '43', null, '0', '1', null, null, '1', '0');
INSERT INTO `web_category` VALUES ('86', 'Đồ gia dụng & Nội thất', '0', null, '0', '1', null, null, '1', '6');
INSERT INTO `web_category` VALUES ('89', 'Nội thất phòng tắm', '86', null, '0', '1', null, null, '1', '0');
INSERT INTO `web_category` VALUES ('90', 'Thực phẩm', '0', null, '1', '1', null, null, '1', '0');
INSERT INTO `web_category` VALUES ('91', 'Thực phẩm chế biến sẵn', '90', null, '1', '1', null, null, '1', '5');
INSERT INTO `web_category` VALUES ('92', 'Vật dụng nhà bếp', '86', null, '0', '1', null, null, '1', '0');
INSERT INTO `web_category` VALUES ('93', 'Thực phẩm khô', '90', null, '1', '1', null, null, '1', '4');
INSERT INTO `web_category` VALUES ('94', 'Thực phẩm tươi sống', '90', null, '1', '1', null, null, '1', '2');
INSERT INTO `web_category` VALUES ('95', 'Rau - Củ - Quả', '90', null, '1', '1', null, null, '1', '1');
INSERT INTO `web_category` VALUES ('97', 'Thời trang', '0', null, '1', '1', null, null, '1', '0');
INSERT INTO `web_category` VALUES ('98', 'Áo sơmi nam', '97', null, '1', '1', null, null, '1', '2');
INSERT INTO `web_category` VALUES ('99', 'Áo khoác, Vest nam', '97', null, '1', '1', null, null, '1', '3');
INSERT INTO `web_category` VALUES ('102', 'Quần và Áo phông nam', '97', null, '0', '1', null, null, '1', '4');
INSERT INTO `web_category` VALUES ('103', 'Đồ lót, Đồ bơi nam', '97', null, '1', '1', null, null, '1', '5');
INSERT INTO `web_category` VALUES ('104', 'Đồ thể thao, mặc nhà nam', '97', null, '1', '1', null, null, '1', '6');
INSERT INTO `web_category` VALUES ('105', 'Quần áo - đồ sơ sinh', '41', null, '1', '1', null, null, '1', '9');
INSERT INTO `web_category` VALUES ('106', 'Đầm, váy Nữ', '97', null, '1', '1', null, null, '1', '11');
INSERT INTO `web_category` VALUES ('107', 'Áo sơ mi nữ', '97', null, '1', '1', null, null, '1', '7');
INSERT INTO `web_category` VALUES ('108', 'Áo Khoác và Vest Nữ', '97', null, '1', '1', null, null, '1', '8');
INSERT INTO `web_category` VALUES ('110', 'Đồ lót, đồ bơi nữ', '97', null, '1', '1', null, null, '1', '9');
INSERT INTO `web_category` VALUES ('111', 'Đồ thể thao, mặc nhà nữ', '97', null, '1', '1', null, null, '1', '10');
INSERT INTO `web_category` VALUES ('113', 'Quần & chân váy nữ', '97', null, '1', '1', null, null, '1', '12');
INSERT INTO `web_category` VALUES ('115', 'Phụ kiện thời trang Nữ', '97', null, '1', '1', null, null, '1', '14');
INSERT INTO `web_category` VALUES ('116', 'Phụ kiện thời trang trẻ em', '97', null, '1', '1', null, null, '1', '15');
INSERT INTO `web_category` VALUES ('119', 'Phụ kiện thời trang Nam', '97', null, '1', '1', null, null, '1', '13');
INSERT INTO `web_category` VALUES ('122', 'Giày dép, túi xách trẻ em', '97', null, '1', '1', null, null, '1', '18');
INSERT INTO `web_category` VALUES ('127', 'Giày dép, túi xách Nữ', '97', null, '1', '1', null, null, '1', '17');
INSERT INTO `web_category` VALUES ('134', 'Thời trang bé trai', '133', null, '0', '1', null, null, '0', '0');
INSERT INTO `web_category` VALUES ('135', 'Thời trang bé gái', '133', null, '0', '1', null, null, '0', '0');
INSERT INTO `web_category` VALUES ('139', 'Giày dép, túi sách Nam', '97', null, '1', '1', null, null, '1', '16');
INSERT INTO `web_category` VALUES ('140', 'Máy tính, laptop', '43', null, '0', '1', null, null, '1', '0');
INSERT INTO `web_category` VALUES ('141', 'Máy tính bảng', '43', null, '0', '1', null, null, '1', '0');
INSERT INTO `web_category` VALUES ('143', 'Máy in', '43', null, '0', '1', null, null, '1', '0');
INSERT INTO `web_category` VALUES ('144', 'Màn hình', '43', null, '0', '1', null, null, '1', '0');
INSERT INTO `web_category` VALUES ('145', 'Máy ảnh - Máy quay', '43', null, '0', '1', null, null, '1', '0');
INSERT INTO `web_category` VALUES ('146', 'Mỹ phẩm nam', '96', null, '0', '1', null, null, '0', '0');
INSERT INTO `web_category` VALUES ('147', 'Thiết bị an ninh', '43', null, '0', '1', null, null, '1', '0');
INSERT INTO `web_category` VALUES ('148', 'Tivi - Âm thanh - Thiết bị Số', '43', null, '0', '1', null, null, '1', '0');
INSERT INTO `web_category` VALUES ('151', 'Xe máy và phụ kiện', '207', null, '0', '1', null, null, '1', '2');
INSERT INTO `web_category` VALUES ('153', 'Dụng cụ nhà bếp', '86', null, '0', '1', null, null, '1', '0');
INSERT INTO `web_category` VALUES ('154', 'Đồ điện gia dụng', '86', null, '0', '1', null, null, '1', '0');
INSERT INTO `web_category` VALUES ('155', 'Sản phẩm tiện ích', '86', null, '0', '1', null, null, '1', '0');
INSERT INTO `web_category` VALUES ('156', 'Dây - cáp điện', '86', null, '0', '1', null, null, '1', '0');
INSERT INTO `web_category` VALUES ('157', 'Nội thất và trang trí nhà ở', '86', null, '0', '1', null, null, '1', '0');
INSERT INTO `web_category` VALUES ('164', 'Mỹ phẩm - làm đẹp', '0', null, '1', '1', null, null, '1', '0');
INSERT INTO `web_category` VALUES ('165', 'Trang điểm - phụ kiện', '164', null, '1', '1', null, null, '1', '2');
INSERT INTO `web_category` VALUES ('166', 'Chăm sóc cơ thể', '164', null, '1', '1', null, null, '1', '6');
INSERT INTO `web_category` VALUES ('167', 'Chăm sóc tóc', '164', null, '0', '1', null, null, '1', '5');
INSERT INTO `web_category` VALUES ('168', 'Chăm sóc mặt', '164', null, '1', '1', null, null, '1', '4');
INSERT INTO `web_category` VALUES ('170', 'Bé học và chơi', '41', null, '1', '1', null, null, '1', '7');
INSERT INTO `web_category` VALUES ('171', 'Giường - nôi - xe cho bé', '41', null, '1', '1', null, null, '1', '6');
INSERT INTO `web_category` VALUES ('172', 'Đồ dùng chăm sóc bé', '41', null, '1', '1', null, null, '1', '5');
INSERT INTO `web_category` VALUES ('173', 'Dinh dưỡng cho bé', '41', null, '1', '1', null, null, '1', '4');
INSERT INTO `web_category` VALUES ('174', 'Sữa & Bột', '41', null, '1', '1', null, null, '1', '3');
INSERT INTO `web_category` VALUES ('175', 'Tã bỉm', '41', null, '1', '1', null, null, '1', '2');
INSERT INTO `web_category` VALUES ('176', 'Thiết bị, phụ kiện làm đẹp', '164', null, '1', '1', null, null, '1', '17');
INSERT INTO `web_category` VALUES ('177', 'Chăm sóc cho mẹ', '41', null, '1', '1', null, null, '1', '13');
INSERT INTO `web_category` VALUES ('178', 'Y tế cho mẹ & bé', '41', null, '1', '1', null, null, '1', '12');
INSERT INTO `web_category` VALUES ('179', 'Thời trang bầu - sau sinh', '41', null, '1', '1', null, null, '1', '12');
INSERT INTO `web_category` VALUES ('180', 'Thời trang Tween & Teen', '97', null, '1', '1', null, null, '1', '19');
INSERT INTO `web_category` VALUES ('181', 'Thời trang trẻ em', '97', null, '1', '1', null, null, '1', '20');
INSERT INTO `web_category` VALUES ('182', 'Thời trang painting - handmade', '97', null, '1', '1', null, null, '1', '21');
INSERT INTO `web_category` VALUES ('183', 'Nước hoa,chất tạo hương', '164', null, '1', '1', null, null, '1', '3');
INSERT INTO `web_category` VALUES ('184', 'Khóa học - đào tạo', '0', null, '0', '1', '', '', '0', '0');
INSERT INTO `web_category` VALUES ('185', 'Khóa chính quy - dài hạn', '184', null, '1', '1', null, null, '1', '1');
INSERT INTO `web_category` VALUES ('186', 'Khóa học ngoại ngữ', '184', null, '0', '1', null, null, '1', '2');
INSERT INTO `web_category` VALUES ('187', 'Khóa ngắn hạn - khóa hè', '184', null, '1', '1', null, null, '1', '3');
INSERT INTO `web_category` VALUES ('188', 'Ngoại khóa - Kỹ năng sống', '184', null, '1', '1', null, null, '1', '4');
INSERT INTO `web_category` VALUES ('189', 'Đào tạo Online - Trực tuyến', '184', null, '1', '1', null, null, '1', '5');
INSERT INTO `web_category` VALUES ('190', 'Gia Sư - Phụ đạo', '184', null, '1', '1', null, null, '1', '6');
INSERT INTO `web_category` VALUES ('191', 'Du học', '184', null, '1', '1', null, null, '1', '7');
INSERT INTO `web_category` VALUES ('192', 'Thực phẩm đông lạnh', '90', null, '1', '1', null, null, '1', '6');
INSERT INTO `web_category` VALUES ('193', 'Bia rượu - giải khát', '90', null, '1', '1', null, null, '1', '7');
INSERT INTO `web_category` VALUES ('194', 'Gia vị - tạp hóa', '90', null, '1', '1', null, null, '1', '3');
INSERT INTO `web_category` VALUES ('195', 'Bánh kẹo - đồ ăn vặt', '90', null, '1', '1', null, null, '1', '8');
INSERT INTO `web_category` VALUES ('196', 'Thực phẩm chức năng', '90', null, '1', '1', null, null, '1', '9');
INSERT INTO `web_category` VALUES ('197', 'Thực phẩm cho thú yêu', '90', null, '1', '1', null, null, '1', '10');
INSERT INTO `web_category` VALUES ('198', 'Mỹ phẩm cho nam giới', '164', null, '1', '1', null, null, '1', '11');
INSERT INTO `web_category` VALUES ('199', 'Chăm sóc móng, tay, chân', '164', null, '1', '1', null, null, '1', '8');
INSERT INTO `web_category` VALUES ('200', 'Chăm sóc da', '164', null, '1', '1', null, null, '1', '9');
INSERT INTO `web_category` VALUES ('201', 'Chăm sóc sức khỏe', '164', null, '1', '1', null, null, '1', '10');
INSERT INTO `web_category` VALUES ('202', 'Mỹ phẩm cho trẻ em', '164', null, '1', '1', null, null, '1', '12');
INSERT INTO `web_category` VALUES ('203', 'Mỹ phẩm xách tay', '164', null, '1', '1', null, null, '1', '13');
INSERT INTO `web_category` VALUES ('204', 'Mỹ phẩm tự chế', '164', null, '1', '1', null, null, '1', '14');
INSERT INTO `web_category` VALUES ('205', 'Spa & Massage', '164', null, '1', '1', null, null, '1', '15');
INSERT INTO `web_category` VALUES ('206', 'Dịch vụ trang điểm', '164', null, '1', '1', null, null, '1', '16');
INSERT INTO `web_category` VALUES ('207', 'Xe và phụ kiện', '0', null, '1', '1', null, null, '1', '7');
INSERT INTO `web_category` VALUES ('208', 'Ô tô và phụ kiện', '207', null, '0', '1', null, null, '1', '1');
INSERT INTO `web_category` VALUES ('209', 'Xe điện & Phụ kiện', '207', null, '1', '1', null, null, '1', '3');
INSERT INTO `web_category` VALUES ('210', 'Xe đạp & phụ kiện', '207', null, '1', '1', null, null, '1', '4');
INSERT INTO `web_category` VALUES ('211', 'Xe trẻ em & phụ kiện', '207', null, '1', '1', null, null, '1', '5');
INSERT INTO `web_category` VALUES ('212', 'Sửa & Làm mới xe', '207', null, '1', '1', null, null, '1', '6');
INSERT INTO `web_category` VALUES ('213', 'Thực phẩm chay', '90', null, '0', '1', null, null, '1', '1');
INSERT INTO `web_category` VALUES ('214', 'Nhà sạch - nhà đẹp', '0', null, '0', '1', null, null, '1', '0');
INSERT INTO `web_category` VALUES ('215', 'Nội thất phòng khách', '214', null, '1', '1', null, null, '1', '2');
INSERT INTO `web_category` VALUES ('216', 'Nội thất phòng ngủ', '214', null, '1', '1', null, null, '1', '3');
INSERT INTO `web_category` VALUES ('217', 'Nội thất phòng tắm', '214', null, '1', '1', null, null, '1', '4');
INSERT INTO `web_category` VALUES ('218', 'Nội thất phòng ăn - bếp', '214', null, '1', '1', null, null, '1', '5');
INSERT INTO `web_category` VALUES ('219', 'Sân - vườn ', '214', null, '1', '1', null, null, '1', '6');
INSERT INTO `web_category` VALUES ('220', 'Vật liệu tân trang nhà', '214', null, '1', '1', null, null, '1', '7');
INSERT INTO `web_category` VALUES ('221', 'Hóa phẩm - chất giặt tẩy', '214', null, '1', '1', null, null, '1', '8');
INSERT INTO `web_category` VALUES ('222', 'Đơn vị thi công - sửa chữa nhà', '214', null, '1', '1', null, null, '1', '9');
INSERT INTO `web_category` VALUES ('223', 'Dịch vụ lau - dọn nhà', '214', null, '1', '1', null, null, '1', '10');
INSERT INTO `web_category` VALUES ('224', 'Vật liệu xây dựng', '214', null, '1', '1', null, null, '1', '11');
INSERT INTO `web_category` VALUES ('225', 'Ẩm thực - Giải trí', '0', null, '0', '1', '', '', '0', '0');
INSERT INTO `web_category` VALUES ('226', 'Buffet', '225', null, '1', '1', null, null, '1', '2');
INSERT INTO `web_category` VALUES ('227', 'Nhà hàng', '225', null, '1', '1', null, null, '1', '3');
INSERT INTO `web_category` VALUES ('228', 'Quán xá - ăn vặt', '225', null, '1', '1', null, null, '1', '4');
INSERT INTO `web_category` VALUES ('229', 'Xem gì đây?', '225', null, '1', '1', null, null, '1', '5');
INSERT INTO `web_category` VALUES ('230', 'Nghe gì đây?', '225', null, '1', '1', null, null, '1', '6');
INSERT INTO `web_category` VALUES ('231', 'Chơi gì đây?', '225', null, '1', '1', null, null, '1', '7');
INSERT INTO `web_category` VALUES ('232', 'Du lịch - Nghỉ dưỡng', '0', null, '0', '1', null, null, '0', '0');
INSERT INTO `web_category` VALUES ('233', 'Tour Du lịch', '232', null, '0', '1', null, null, '1', '2');
INSERT INTO `web_category` VALUES ('234', 'Resort', '232', null, '0', '1', null, null, '1', '3');
INSERT INTO `web_category` VALUES ('235', 'Trang trại - Điền viên', '232', null, '0', '1', null, null, '1', '4');
INSERT INTO `web_category` VALUES ('236', 'Khách sạn - Nhà nghỉ', '232', null, '0', '1', null, null, '1', '5');
INSERT INTO `web_category` VALUES ('237', 'Vé máy bay - tàu - xe', '232', null, '0', '1', null, null, '1', '6');
INSERT INTO `web_category` VALUES ('238', 'Thuê xe ', '232', null, '0', '1', null, null, '1', '7');
INSERT INTO `web_category` VALUES ('239', 'Văn phòng phẩm - Sách báo', '0', null, '0', '1', '', '', '0', '0');
INSERT INTO `web_category` VALUES ('240', 'Sách - Truyện ', '239', null, '0', '1', null, null, '1', '2');
INSERT INTO `web_category` VALUES ('241', 'Tạp chí - Báo', '239', null, '0', '1', null, null, '1', '3');
INSERT INTO `web_category` VALUES ('242', 'Văn phòng phẩm', '239', null, '0', '1', null, null, '1', '4');
INSERT INTO `web_category` VALUES ('243', 'Đồ dùng học sinh', '239', null, '0', '1', null, null, '1', '5');
INSERT INTO `web_category` VALUES ('244', 'Quà tặng', '239', null, '0', '1', null, null, '1', '6');
INSERT INTO `web_category` VALUES ('245', 'Đồ Hànmade', '239', null, '0', '1', null, null, '1', '7');
INSERT INTO `web_category` VALUES ('246', 'Dịch vụ', '0', null, '0', '1', '', '', '0', '0');
INSERT INTO `web_category` VALUES ('247', 'Nấu cỗ', '246', null, '0', '1', null, null, '1', '2');
INSERT INTO `web_category` VALUES ('248', 'Đám hỏi - Đám cưới', '246', null, '0', '1', null, null, '1', '3');
INSERT INTO `web_category` VALUES ('249', 'Đám hiếu', '246', null, '0', '1', null, null, '1', '4');
INSERT INTO `web_category` VALUES ('250', 'Ô sin - giúp việc', '246', null, '0', '1', null, null, '1', '5');
INSERT INTO `web_category` VALUES ('251', 'Chụp ảnh', '246', null, '0', '1', null, null, '1', '6');
INSERT INTO `web_category` VALUES ('252', 'Biên - phiên dịch 2', '90', null, '0', '1', '', '', '0', '0');
INSERT INTO `web_category` VALUES ('253', 'Chăn ga gối đệm', '86', null, '0', '1', '', '', '1', '0');
