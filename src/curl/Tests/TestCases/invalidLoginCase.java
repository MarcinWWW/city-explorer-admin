package Tests.TestCases;

import static org.testng.Assert.assertEquals;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;
import org.testng.Assert;
import org.testng.annotations.AfterMethod;
import org.testng.annotations.AfterTest;
import org.testng.annotations.BeforeTest;
import org.testng.annotations.Test;

import Tests.PageObjects.FrontPage;


public class invalidLoginCase {
	
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
	public void incorrectUserDataLogin() {
		objFront = new FrontPage(driver);
		objFront.setLogin("admin12");
		objFront.setPassword("admin1");
		objFront.login();
		assertEquals(driver.findElement(By.xpath("//div[@id='center_failed_login']//p[1]")).isDisplayed(), true);
	}
	
	
	@AfterMethod
	public void closeDriver() throws InterruptedException {
		objFront = new FrontPage(driver);
		Thread.sleep(1000);
        driver.quit();
    }
}
