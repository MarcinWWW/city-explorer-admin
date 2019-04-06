package Tests;

import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;
import org.testng.Assert;
import org.testng.annotations.AfterMethod;
import org.testng.annotations.AfterTest;
import org.testng.annotations.BeforeTest;
import org.testng.annotations.Test;

import PageObjects.FrontPage;


public class registerNewUserTest {
	
	WebDriver driver;
	FrontPage objFront;
	@BeforeTest
	public void setup() {
		System.setProperty("webdriver.chrome.driver", "D:\\Selenium\\chromedriver.exe");	//PRACA
		driver = new ChromeDriver();
		driver.manage().window().maximize();
		driver.get("https://cityexplorer.000webhostapp.com/");
	}
	
	@Test
	public void correctUserData() throws InterruptedException {
		objFront = new FrontPage(driver);
		objFront.createAcc();
		objFront.setNewLogin("tester");
		objFront.setNewPassword("pw");
		objFront.setNewEmail("email@gmail.com");
		objFront.saveNewAccount();
	}
	
	@AfterMethod
	public void closeDriver() throws InterruptedException {
		objFront = new FrontPage(driver);
		Thread.sleep(1000);
		objFront.logout();
        System.out.println("Test przeprowadzony prawid³owo, u¿ytkownik zarejestrowany");
        driver.quit();
    }
}
