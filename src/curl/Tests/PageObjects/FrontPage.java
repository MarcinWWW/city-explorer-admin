package Tests.PageObjects;

import org.junit.Assert;
import org.openqa.selenium.Keys;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.support.FindBy;
import org.openqa.selenium.support.PageFactory;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.WebDriverWait;

public class FrontPage {

	@FindBy (xpath="//input[@id='inp_log1']")
	private WebElement usrLogin;
	
	@FindBy(xpath="//input[@id='inp_log2']")
	private WebElement usrPasswd;
	
	@FindBy(xpath="//div[@id='submit2']")
	private WebElement loginBtn;
	
	@FindBy(xpath="//a[@id='btnAdd']")
	private WebElement bcnAddBtn;
	
	@FindBy(xpath="//a[@id='btnPlaces']")
	private WebElement bcnPlacesBtn;
	
	@FindBy(xpath="//a[@id='btnRank']")
	private WebElement bcnRankingBtn;
	
	@FindBy(xpath="//p[@class='login_tekst']")
	private WebElement logOrRegisterBtn;
	
	@FindBy(xpath="//p[@id='rejestracja']")
	private WebElement registerBtn;
	
	@FindBy(xpath="//input[@id='val_login']")
	private WebElement regLogin;
	
	@FindBy(xpath="//input[@id='val_pass']")
	private WebElement regPasswd;
	
	@FindBy(xpath="//input[@placeholder='powtórz has³o']")
	private WebElement repPasswd;

	@FindBy(xpath="//input[@name='inp_email']")
	private WebElement regEmail;
	
	@FindBy(xpath="//input[@name='adm_checkbox']")
	private WebElement regAdminChckBox;
	
	@FindBy(xpath="//input[@id='chk_reg']")
	private WebElement regulaminChckBox;
	
	@FindBy(xpath="//div[@id='submit']")
	private WebElement submitBtn;
	
	@FindBy(xpath="//input[@value='wyloguj']")
	private WebElement logoutBtn;
	
	@FindBy(xpath="//input[@id='beacon_id']")
	private WebElement beaconMajorID;
	
	@FindBy(xpath="//input[@id='beacon_id_minor']")
	private WebElement beaconMinorID;
	
	
	@FindBy(xpath="//input[@id='beacon_nazwa']")
	private WebElement beaconName;
	
	@FindBy(xpath="//input[@id='beacon_grupa']")
	private WebElement beaconGrp;
	
	@FindBy(xpath="//input[@id='beacon_location']")
	private WebElement beaconLoc;
	
	@FindBy(xpath="//input[@id='beacon_address']")
	private WebElement beaconAddr;
	
	@FindBy(xpath="//input[@id='beacon_coordinates']")
	private WebElement beaconCoords;
	
	@FindBy(xpath="//div[@id='submit_dodaj']")
	private WebElement dodajBcn;
	
	@FindBy(xpath="//li[@id='add_usun']")
	private WebElement delBcn;
	
	@FindBy(xpath="//input[@id='obrazek']")
	private WebElement addFile;
	
	@FindBy(xpath="//input[@id='akcja_name']")
	private WebElement actionName;
	
	@FindBy (xpath="//select[@id='akcja_select']")
	private WebElement actionList;
	
	WebDriver driver;
	public FrontPage(WebDriver driver) 
	{
		this.driver=driver;
		PageFactory.initElements(driver, this);
	}
	
	public void setLogin(String userLogin) {
		usrLogin.sendKeys(userLogin);
	}

	public void setPassword(String userPasswd) {
		usrPasswd.sendKeys(userPasswd);
	}
	
/*	
	public void setID(String id) {
		beaconID.sendKeys(id);
		bcnId=id;
	}*/
	
	String bcnId;
	public void setMajorID(int id) {
		beaconMajorID.sendKeys(Integer.toString(id));
		bcnId=Integer.toString(id);
	}
	
	public void setMinorID(int id) {
		beaconMinorID.sendKeys(Integer.toString(id));
	}
	
	/*public void setMinorID(String minoID) {
		beaconMinorID.sendKeys(minoID);
	}*/
	
	String bcnNm;
	public void setBcnName(String bcnName) {
		beaconName.sendKeys(bcnName);
		bcnNm=bcnName;
	}
	
	public String getBcnName() {
		return bcnNm;
	}
	
	public void setBcnGrp(String bcnGroup) {
		beaconGrp.sendKeys(bcnGroup);
	}
	
	public void setBcnLoc(String bcnLoc) {
		beaconLoc.sendKeys(bcnLoc);
	}
	
	public void setBcnAddr(String bcnAddr) {
		beaconAddr.sendKeys(bcnAddr);
	}
	
	public void setBcnCords(String bcnCords) {
		beaconCoords.sendKeys(bcnCords);
	}
	
	public void login() {
		WebDriverWait wait = new WebDriverWait(driver, 10);
		wait.until(ExpectedConditions.elementToBeClickable(loginBtn)).click();
	}
	
	public void logout() {
		WebDriverWait wait = new WebDriverWait(driver, 10);
		wait.until(ExpectedConditions.elementToBeClickable(logoutBtn)).click();
	}
	
	public void newBeacon() {
		WebDriverWait wait = new WebDriverWait(driver, 10);
		wait.until(ExpectedConditions.elementToBeClickable(dodajBcn)).click();
	}
	
	public void bcnList() {
		WebDriverWait wait = new WebDriverWait(driver, 10);
		wait.until(ExpectedConditions.elementToBeClickable(bcnPlacesBtn)).click();
	}
	
	public void deleteBcn() {
		WebDriverWait wait = new WebDriverWait(driver, 10);
		wait.until(ExpectedConditions.elementToBeClickable(delBcn)).click();
	}
	
	public void createAcc() throws InterruptedException {
	WebDriverWait wait = new WebDriverWait(driver, 10);
	wait.until(ExpectedConditions.elementToBeClickable(logOrRegisterBtn)).click();
	wait.until(ExpectedConditions.elementToBeClickable(registerBtn)).click();
	wait.until(ExpectedConditions.elementToBeClickable(regulaminChckBox)).click();
	}
	
	public void disableStatut() {
		WebDriverWait wait = new WebDriverWait(driver, 10);
		if(regulaminChckBox.isEnabled()) {
			wait.until(ExpectedConditions.elementToBeClickable(regulaminChckBox)).click();
		}
		else {
			System.out.println("checkbox odznaczony");
			Assert.fail();
		}
	}
	
	public void setNewLogin(String login) {
		WebDriverWait wait = new WebDriverWait(driver, 10);
		wait.until(ExpectedConditions.elementToBeClickable(regLogin)).sendKeys(login);
	}
	
	public void setNewPassword(String pw) {
		WebDriverWait wait = new WebDriverWait(driver, 10);
		wait.until(ExpectedConditions.elementToBeClickable(regPasswd)).sendKeys(pw);
		wait.until(ExpectedConditions.elementToBeClickable(repPasswd)).sendKeys(pw);
	}
	
	public void setNewEmail(String email) {
		regEmail.sendKeys(email);
	}
	
	public void saveNewAccount() {
		WebDriverWait wait = new WebDriverWait(driver, 10);
		wait.until(ExpectedConditions.elementToBeClickable(submitBtn)).click();
	}
	
	public void addFile(String actName) {
		WebDriverWait wait = new WebDriverWait(driver, 10);
		//wait.until(ExpectedConditions.elementToBeClickable(addFile)).click();
		addFile.sendKeys("C:\\test.jpeg");
		actionName.sendKeys(actName);
		actionList.click();
		actionList.sendKeys(Keys.DOWN);
		actionList.sendKeys(Keys.ENTER);
	}
	
}
