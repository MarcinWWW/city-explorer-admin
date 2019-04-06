package Tests;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;
import org.openqa.selenium.interactions.Actions;
import org.testng.Assert;
import org.testng.annotations.AfterMethod;
import org.testng.annotations.AfterTest;
import org.testng.annotations.BeforeTest;
import org.testng.annotations.Test;

import PageObjects.FrontPage;


public class addNewBeaconTest2 {
	
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
	public void newBeaconTest() {
		objFront = new FrontPage(driver);
		objFront.setLogin("danadmin");
		objFront.setPassword("admin");
		objFront.login();
		objFront.setID("1337");
		objFront.setMinorId("2137");
		objFront.setBcnName("nazwa Test");
		objFront.setBcnGrp("grupa Test");
		objFront.setBcnLoc("miasto Test");
		objFront.setBcnAddr("ulica Test");
		objFront.newBeacon();
		objFront.bcnList();
		Assert.assertEquals(driver.findElement(By.xpath("//div[contains(text(),'"+objFront.getBcnName()+"')]")).getText(), objFront.getBcnName());
	}
	
	@AfterMethod
	public void closeDriver() throws InterruptedException {
		objFront = new FrontPage(driver);
		Thread.sleep(1000);
		objFront.logout();
        //System.out.println("Test przeprowadzony prawid³owo, Beacon zosta³ dodany.");
        driver.quit();
    }
}
