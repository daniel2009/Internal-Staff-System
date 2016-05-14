CREATE TABLE `admin` (
  `user_id` varchar(25) NOT NULL,
  `password` varchar(30) NOT NULL,
  `authority` varchar(5) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `event_summary` (
  `event_id` int(11) NOT NULL,
  `type` varchar(45) DEFAULT NULL,
  `location` varchar(45) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `topic` varchar(99) DEFAULT NULL,
  `ticket_price` decimal(11,0) DEFAULT NULL,
  `number_of_mentors` varchar(45) DEFAULT NULL,
  `number_of_attendees` varchar(45) DEFAULT NULL,
  `employee_leader` varchar(45) DEFAULT NULL,
  `notes` text,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `internal_referral_record` (
  `internal_referral_id` int(11) DEFAULT NULL,
  `candidate_type` tinyint(1) DEFAULT NULL COMMENT '1:mentee 0:talent',
  `mentee_id` int(11) DEFAULT NULL,
  `talent_id` int(11) DEFAULT NULL,
  `refer_date` date DEFAULT NULL,
  `current_status` varchar(45) DEFAULT NULL,
  `interview_date` date DEFAULT NULL,
  `hired_date` date DEFAULT NULL,
  KEY `internal_referral_opportunities_idx` (`internal_referral_id`),
  KEY `internal_referral_tracking_id_idx` (`mentee_id`),
  KEY `internal_referral_talent_id_idx` (`talent_id`),
  CONSTRAINT `internal_referral_mentee_id` FOREIGN KEY (`mentee_id`) REFERENCES `mentees_basic` (`mentee_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `internal_referral_talent_id` FOREIGN KEY (`talent_id`) REFERENCES `talent_pool` (`talent_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `internal_referral_opportunities` FOREIGN KEY (`internal_referral_id`) REFERENCES `Internal_referral_summary` (`internal_referral_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `Internal_referral_summary` (
  `internal_referral_id` int(11) NOT NULL AUTO_INCREMENT,
  `company` varchar(80) DEFAULT NULL,
  `postion` varchar(45) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `type` tinyint(1) DEFAULT NULL,
  `location` varchar(45) DEFAULT NULL,
  `requirement` text,
  `job_discription` text,
  `link` varchar(99) DEFAULT NULL,
  `expire_date` date DEFAULT NULL,
  `submission_date` date DEFAULT NULL,
  PRIMARY KEY (`internal_referral_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `mentees_basic` (
  `mentee_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(20) DEFAULT NULL,
  `lastname` varchar(20) DEFAULT NULL,
  `othername` varchar(45) DEFAULT NULL,
  `location` varchar(45) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `wechat` varchar(30) DEFAULT NULL,
  `school` varchar(80) DEFAULT NULL,
  `major` varchar(80) DEFAULT NULL,
  `degree` varchar(80) DEFAULT NULL,
  `graduation_date` date DEFAULT NULL,
  `first_concentration` varchar(60) DEFAULT NULL,
  `second_concentration` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`mentee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `mentors_basic` (
  `mentor_id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(20) NOT NULL,
  `firstname` varchar(20) DEFAULT NULL,
  `title` varchar(99) DEFAULT NULL,
  `company` varchar(80) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `wechat` varchar(45) DEFAULT NULL,
  `education` varchar(80) DEFAULT NULL,
  `location` varchar(80) DEFAULT NULL,
  `linkedin` varchar(80) DEFAULT NULL,
  `evaluation` varchar(80) DEFAULT NULL,
  `note` tinytext,
  `bio_note` tinytext,
  PRIMARY KEY (`mentor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=utf8;

CREATE TABLE `mentors_specialty` (
  `field` varchar(25) DEFAULT NULL,
  `specialty` varchar(45) DEFAULT NULL,
  `mentor_id` int(11) DEFAULT NULL,
  `specialty_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`specialty_id`),
  KEY `specialty_idx` (`mentor_id`),
  CONSTRAINT `specialty` FOREIGN KEY (`mentor_id`) REFERENCES `mentors_basic` (`mentor_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=475 DEFAULT CHARSET=utf8;

CREATE TABLE `mock_interview_record` (
  `mock_interview_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_record_id` int(11) DEFAULT NULL,
  `interview_company` varchar(45) DEFAULT NULL,
  `interview_position` varchar(45) DEFAULT NULL,
  `interview_date` date DEFAULT NULL,
  `mentor_id` int(11) DEFAULT NULL,
  `mock_date` date DEFAULT NULL,
  `result` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`mock_interview_id`),
  KEY `mock_mentor_idx` (`mentor_id`),
  KEY `mock_service_record_id_idx` (`service_record_id`),
  CONSTRAINT `mock_service_record_id` FOREIGN KEY (`service_record_id`) REFERENCES `service_records` (`service_record_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mock_mentor` FOREIGN KEY (`mentor_id`) REFERENCES `mentors_basic` (`mentor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `non_referral_offer_record` (
  `offer_id` int(11) NOT NULL,
  `mentee_id` int(11) DEFAULT NULL,
  `type` tinyint(1) DEFAULT NULL,
  `company` varchar(80) DEFAULT NULL,
  `positon` varchar(80) DEFAULT NULL,
  `interview_date` date DEFAULT NULL,
  `hired_date` date DEFAULT NULL,
  PRIMARY KEY (`offer_id`),
  KEY `offer_record_mentee_id_idx` (`mentee_id`),
  CONSTRAINT `offer_record_mentee_id` FOREIGN KEY (`mentee_id`) REFERENCES `mentees_basic` (`mentee_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `pre_talk` (
  `mentee_id` int(11) NOT NULL,
  `source` varchar(45) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `mentor_id` int(11) DEFAULT NULL,
  `pre_talk_close_status` tinyint(1) DEFAULT NULL,
  `close_note` text,
  `recommend_service` varchar(45) DEFAULT NULL,
  `three_days_follow` varchar(45) DEFAULT NULL,
  `final_close_status` tinyint(1) DEFAULT NULL,
  KEY `mentee_pre_talk_idx` (`mentee_id`),
  KEY `mentor_pre_talk_idx` (`mentor_id`),
  CONSTRAINT `mentor_pre_talk` FOREIGN KEY (`mentor_id`) REFERENCES `mentors_basic` (`mentor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `mentee_pre_talk` FOREIGN KEY (`mentee_id`) REFERENCES `mentees_basic` (`mentee_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `profile_builder_record` (
  `record_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_record_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `first_revision_date` date DEFAULT NULL,
  `second_revision_date` date DEFAULT NULL,
  `third_revision_date` date DEFAULT NULL,
  `mentor_id` int(11) DEFAULT NULL,
  `offer` tinyint(1) DEFAULT NULL,
  `note` text,
  PRIMARY KEY (`record_id`),
  KEY `profile_builder_mentor_idx` (`mentor_id`),
  KEY `profile_builder_service_record_id_idx` (`service_record_id`),
  CONSTRAINT `profile_builder_service_record_id` FOREIGN KEY (`service_record_id`) REFERENCES `service_records` (`service_record_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `profile_builder_mentor` FOREIGN KEY (`mentor_id`) REFERENCES `mentors_basic` (`mentor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `refer_me_record` (
  `record_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_record_id` int(11) DEFAULT NULL,
  `job_type` tinyint(1) DEFAULT NULL,
  `field` varchar(45) DEFAULT NULL,
  `position` varchar(45) DEFAULT NULL,
  `lead_mentor_id` int(11) DEFAULT NULL,
  `mock_mentor_id` int(11) DEFAULT NULL,
  `first_interview_date` date DEFAULT NULL,
  `first_interview_company` varchar(45) DEFAULT NULL,
  `first_interview_position` varchar(45) DEFAULT NULL,
  `first_interview_result` tinyint(1) DEFAULT NULL,
  `first_interview_note` text,
  `second_interview_date` date DEFAULT NULL,
  `second_interview_company` varchar(45) DEFAULT NULL,
  `second_interview_position` varchar(45) DEFAULT NULL,
  `second_interview_result` tinyint(1) DEFAULT NULL,
  `second_interview_note` text,
  PRIMARY KEY (`record_id`),
  KEY `refer_me_lead_mentor_idx` (`lead_mentor_id`),
  KEY `refer_me_mock_mentor_idx` (`mock_mentor_id`),
  KEY `refer_me_service_id_idx` (`service_record_id`),
  CONSTRAINT `refer_me_mock_mentor` FOREIGN KEY (`mock_mentor_id`) REFERENCES `mentors_basic` (`mentor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `refer_me_service_id` FOREIGN KEY (`service_record_id`) REFERENCES `service_records` (`service_record_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `refer_me_lead_mentor` FOREIGN KEY (`lead_mentor_id`) REFERENCES `mentors_basic` (`mentor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `service_records` (
  `service_record_id` int(11) NOT NULL AUTO_INCREMENT,
  `mentee_id` int(11) DEFAULT NULL,
  `sevice_type` varchar(45) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_amount` int(11) DEFAULT NULL,
  PRIMARY KEY (`service_record_id`),
  KEY `mentee_service_record_idx` (`mentee_id`),
  CONSTRAINT `mentee_service_record` FOREIGN KEY (`mentee_id`) REFERENCES `mentees_basic` (`mentee_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `talent_pool` (
  `talent_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`talent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `unicareer_credit` (
  `record_id` int(11) NOT NULL,
  `service_record_id` int(11) DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `reason` varchar(80) DEFAULT NULL,
  `amount` decimal(10,0) DEFAULT NULL,
  `use_date` date DEFAULT NULL,
  `note` text,
  PRIMARY KEY (`record_id`),
  KEY `credit_service_record_id_idx` (`service_record_id`),
  CONSTRAINT `credit_service_record_id` FOREIGN KEY (`service_record_id`) REFERENCES `service_records` (`service_record_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `vip_service_record` (
  `record_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_record_id` int(11) DEFAULT NULL,
  `job_location` varchar(45) DEFAULT NULL,
  `mpf_track_1` varchar(45) DEFAULT NULL,
  `mpf_track_2` varchar(45) DEFAULT NULL,
  `mpf_built_date` date DEFAULT NULL,
  `first_mentor_id` int(11) DEFAULT NULL,
  `second_mentor_id` int(11) DEFAULT NULL,
  `third_mentor_id` int(11) DEFAULT NULL,
  `mentor_list_sent_date` date DEFAULT NULL,
  `lead_mentor_picked_date` date DEFAULT NULL,
  `lead_mentor_id` int(11) DEFAULT NULL,
  `mentor_change_date` date DEFAULT NULL,
  `changed_to_mentor_id` int(11) DEFAULT NULL,
  `assist_mentor_1` int(11) DEFAULT NULL,
  `assist_mentor_2` int(11) DEFAULT NULL,
  `assist_mentor_3` int(11) DEFAULT NULL,
  `free_boot_camp` int(11) DEFAULT NULL,
  `complete` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`record_id`),
  KEY `first_mentor_id_idx` (`first_mentor_id`),
  KEY `second_mentor_id_idx` (`second_mentor_id`),
  KEY `third_mentor_id_idx` (`third_mentor_id`),
  KEY `lead_mentor_id_idx` (`lead_mentor_id`),
  KEY `changed_to_mentor_id_idx` (`changed_to_mentor_id`),
  KEY `assist_mentor_1_id_idx` (`assist_mentor_1`),
  KEY `assist_mentor_2_id_idx` (`assist_mentor_2`),
  KEY `assist_mentor_3_id_idx` (`assist_mentor_3`),
  KEY `vip_service_record_id_idx` (`service_record_id`),
  CONSTRAINT `vip_service_record_id` FOREIGN KEY (`service_record_id`) REFERENCES `service_records` (`service_record_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `assist_mentor_1_id` FOREIGN KEY (`assist_mentor_1`) REFERENCES `mentors_basic` (`mentor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `assist_mentor_2_id` FOREIGN KEY (`assist_mentor_2`) REFERENCES `mentors_basic` (`mentor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `assist_mentor_3_id` FOREIGN KEY (`assist_mentor_3`) REFERENCES `mentors_basic` (`mentor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `changed_to_mentor_id` FOREIGN KEY (`changed_to_mentor_id`) REFERENCES `mentors_basic` (`mentor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `first_mentor_id` FOREIGN KEY (`first_mentor_id`) REFERENCES `mentors_basic` (`mentor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `lead_mentor_id` FOREIGN KEY (`lead_mentor_id`) REFERENCES `mentors_basic` (`mentor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `second_mentor_id` FOREIGN KEY (`second_mentor_id`) REFERENCES `mentors_basic` (`mentor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `third_mentor_id` FOREIGN KEY (`third_mentor_id`) REFERENCES `mentors_basic` (`mentor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
