from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.support.ui import Select
from selenium.common.exceptions import NoSuchElementException
import unittest, time, re

class TestPasswordLeftBlack(unittest.TestCase):
    def setUp(self):
        self.driver = webdriver.Firefox()
        self.driver.implicitly_wait(30)
        self.base_url = "http://localhost/"
        self.verificationErrors = []
        self.accept_next_alert = True
    
    def test_password_left_black(self):
        driver = self.driver
        driver.get(self.base_url + "/tacklr/")
        driver.find_element_by_link_text("Login").click()
        driver.find_element_by_id("LoginForm_username").clear()
        driver.find_element_by_id("LoginForm_username").send_keys("test1")
        driver.find_element_by_name("yt0").click()
        self.assertTrue(self.is_element_present(By.ID, "LoginForm_password_em_"))
    
    def is_element_present(self, how, what):
        try: self.driver.find_element(by=how, value=what)
        except NoSuchElementException, e: return False
        return True
    
    def is_alert_present(self):
        try: self.driver.switch_to_alert()
        except NoAlertPresentException, e: return False
        return True
    
    def close_alert_and_get_its_text(self):
        try:
            alert = self.driver.switch_to_alert()
            alert_text = alert.text
            if self.accept_next_alert:
                alert.accept()
            else:
                alert.dismiss()
            return alert_text
        finally: self.accept_next_alert = True
    
    def tearDown(self):
        self.driver.quit()
        self.assertEqual([], self.verificationErrors)

if __name__ == "__main__":
    unittest.main()
